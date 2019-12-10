<?php

namespace backend\controllers;


use common\models\Perfil;
use common\models\PerfilAulaSearch;
use Yii;
use common\models\PerfilAula;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PerfilAulaController implements the CRUD actions for PerfilAula model.
 */
class PerfilAulaController extends Controller
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
     * Lists all PerfilAula models.
     * @return mixed
     */
    public function actionIndex()
    {
        $perfilAula_searchModel = new PerfilAulaSearch();
        $perfilAula_dataProvider = $perfilAula_searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'perfilAula_searchModel' => $perfilAula_searchModel,
            'perfilAula_dataProvider' => $perfilAula_dataProvider,
        ]);
    }

    /**
     * Displays a single PerfilAula model.
     * @param integer $IDperfil
     * @param integer $IDaula
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IDperfil, $IDaula)
    {
        return $this->render('view', [
            'model' => $this->findModel($IDperfil, $IDaula),
        ]);
    }

    /**
     * Creates a new PerfilAula model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // variável usada para a verificação da existência do perfil
        $perfilExiste = false;

        // Instanciar modelo e tentar popula-lo
        $model = new PerfilAula();
        $model->load(Yii::$app->request->post());

        // Procurar em todos os perfis se o perfil com o nºSócio inserido existe
        $perfis = Perfil::find()->all();

        foreach ($perfis as $perfil) {
            if ($model->nSocio == $perfil->nSocio) {
                $perfilExiste = true;
                $model->IDperfil = $perfil->IDperfil;
                break;
            }
        }

        // Se o perfil existe e os dados foram validados -> gravar na base de dados e redirecionar para a view do perfilAula criado
        if ($perfilExiste == true && $model->validate()) {
            $model->save();
            return $this->redirect(['view', 'IDperfil' => $model->IDperfil, 'IDaula' => $model->IDaula]);
        }

        // Se os campos não estão preenchidos (primeira vez que se chama a action)
        if ($model->nSocio != null) {

            if ($perfilExiste == false) {
                Yii::$app->getSession()->setFlash('error', 'Sócio não existe');
                $model->nSocio = '';
            }
            else{
                return $this->render('create', ['model' => $model, 'perfis' => $perfis]);
            }
        }


        return $this->render('create', ['model' => $model, 'perfis' => $perfis]);
    }

    /**
     * Updates an existing PerfilAula model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $IDperfil
     * @param integer $IDaula
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($IDperfil, $IDaula)
    {
        $model = $this->findModel($IDperfil, $IDaula);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IDperfil' => $model->IDperfil, 'IDaula' => $model->IDaula]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PerfilAula model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $IDperfil
     * @param integer $IDaula
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IDperfil, $IDaula)
    {
        $this->findModel($IDperfil, $IDaula)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PerfilAula model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $IDperfil
     * @param integer $IDaula
     * @return PerfilAula the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IDperfil, $IDaula)
    {
        if (($model = PerfilAula::findOne(['IDperfil' => $IDperfil, 'IDaula' => $IDaula])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
