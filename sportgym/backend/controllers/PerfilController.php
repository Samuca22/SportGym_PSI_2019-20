<?php

namespace backend\controllers;

use Yii;
use common\models\Perfil;
use common\models\User;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\SignupForm;
use common\models\Adesao;
use common\models\PerfilSearch;
use yii\web\UploadedFile;

/**
 * PerfilController implements the CRUD actions for Perfil model.
 */
class PerfilController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['administrador'],
                    ],
                    [
                        'actions' => ['create', 'delete'],
                        'allow' => false,
                        'roles' => ['colaborador'],
                    ],
                    [
                        'actions' => [],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Perfil models.
     * @return mixed
     */
    public function actionIndex()
    {

        $perfis_searchModel = new PerfilSearch();
        $perfis_dataProvider = $perfis_searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'perfis_searchModel' => $perfis_searchModel,
            'perfis_dataProvider' => $perfis_dataProvider,
        ]);
    }

    /**
     * Displays a single Perfil model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $modelUser = User::find()->where(['id' => $id])->one();

        return $this->render('view', [
            'modelPerfil' => $this->findModel($id),
            'modelUser' => $modelUser,
        ]);
    }

    /**
     * Creates a new Perfil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // irá ser criado um user e o respetivo perfil/adesão
        $modelPerfil = new Perfil();
        $modelUser = new SignupForm();
        $modelAdesao = new Adesao();

        // popular todos os modelos assim como validá-los
        if ($modelUser->load(Yii::$app->request->post()) && $modelUser->validate() && $modelPerfil->load(Yii::$app->request->post()) && $modelPerfil->validate() && $modelAdesao->load(Yii::$app->request->post()) && $modelAdesao->validate()) {
            // gerar username e password automaticos
            $modelUser->atribuirUserPass();

            // caso seja gerado um username já existente
            if (!$modelUser->validate()) {
                $modelUser->atribuirUserPass();
            }

            // guardar user na BD
            $modelUser->signup();

            // sncontrar respetivo user/ atribuir o seu id ao id do perfil / gerar número de sócio
            $user = User::find()->where(['username' => $modelUser->username])->one();
            $modelPerfil->IDperfil = $user->id;
            $modelPerfil->nSocio = 1000 + $modelPerfil->IDperfil;

            // se foi dado upload de imagem - guardar.
            $nome_imagem = 'prof' . $modelPerfil->nSocio;    //Atribui nome aleatório ao ficheiro 
            $modelPerfil->file = UploadedFile::getInstance($modelPerfil, 'file');


            if ($modelPerfil->file != null) {
                $modelPerfil->file->saveAs('uploads/perfis/' . $nome_imagem . '.' . $modelPerfil->file->extension);
                $modelPerfil->foto = $nome_imagem . '.' . $modelPerfil->file->extension;
            }

            // guardar perfil na bd e criar a sua respetiva adesão
            $modelPerfil->save();
            $modelAdesao->dtaInicio = date('Y-m-d H:i:s');
            $modelAdesao->IDperfil = $modelPerfil->IDperfil;
            $modelAdesao->save();
            //$modelUser->sendEmail();

            Yii::$app->getSession()->setFlash('success', 'Inscrição de sócio realizada com sucesso');
            return $this->redirect('index');
        }

        return $this->render('create', [
            'modelPerfil' => $modelPerfil,
            'modelUser' => $modelUser,
            'modelAdesao' => $modelAdesao,
        ]);
    }

    /**
     * Updates an existing Perfil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        // Guardar Perfil e User
        $modelPerfil = $this->findModel($id);
        $modelUser = User::findOne($id);

        // Buscar o role do perfil selecionado
        $auth = Yii::$app->authManager;
        $role = $auth->getRole(array_keys(Yii::$app->authManager->getRolesByUser($id))[0]);

        // Predefinir na view (dropdown list) o estatuto do perfil
        // variavel estatuto guarda o estatuto do perfil antes do update
        if ($role == $auth->getRole('socio')) {
            $modelPerfil->estatuto = 1;
            $estatuto = 1;
        }
        if ($role == $auth->getRole('colaborador')) {
            $modelPerfil->estatuto = 2;
            $estatuto = 2;
        }
        if ($role == $auth->getRole('administrador')) {
            $modelPerfil->estatuto = 3;
            $estatuto = 3;
        }

        // popular e validar o modelo perfil
        if ($modelPerfil->load(Yii::$app->request->post()) && $modelPerfil->validate()) {
            // verificar se o email foi alterado
            if ($modelPerfil->email != $modelUser->getEmail($id)) {
                $outroUser = User::find()->where(['email' => $modelPerfil->email])->one();
                // verificar que o email não existe registado na bd por outro user
                if ($outroUser != null) {
                    Yii::$app->getSession()->setFlash('error', 'Email já existe');
                    return $this->render('update', [
                        'modelPerfil' => $modelPerfil,
                        'modelUser' => $modelUser,
                    ]);
                } else {
                    // popula no modelo user o novo email
                    $modelUser->email = $modelPerfil->email;
                }
            }


            // verifica se o estatuto foi alterado
            if ($modelPerfil->estatuto != $estatuto) {
                if (Yii::$app->user->can('alterarEstatuto')) {
                    // se foi alterado chamar método do perfil para alterar o estatuto
                    $modelPerfil->alterarEstatuto($role);
                } else {
                    Yii::$app->getSession()->setFlash('warning', 'Estatuto não alterado (admin only)');
                }
            }


            // popular no modelo perfil o fila
            $modelPerfil->file = UploadedFile::getInstance($modelPerfil, 'file');
            // se file não for null (se foi dado upload de alguma imagem) atribuir e salvar na pasta uploads
            if ($modelPerfil->file != null) {
                $modelPerfil->atribuirImagem();
            }

            // gravar todas as alterações efetuadas
            $modelUser->save();
            $modelPerfil->save();

            return $this->render('view', [
                'modelPerfil' => $this->findModel($id),
                'modelUser' => $modelUser,
            ]);
        }
        return $this->render('update', [
            'modelPerfil' => $modelPerfil,
            'modelUser' => $modelUser,
        ]);
    }

    /**
     * Deletes an existing Perfil model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        // encontrar respetiva adesao e eliminá-la
        $adesao = Adesao::findOne(['IDperfil' => $id]);
        if ($adesao != null) {
            $adesao->delete();
        }
        // apagar perfil e user 
        $this->findModel($id)->delete();
        User::findOne($id)->delete();


        return $this->redirect(['index']);
    }

    /**
     * Finds the Perfil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Perfil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Perfil::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
