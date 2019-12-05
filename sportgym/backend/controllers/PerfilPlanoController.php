<?php

namespace backend\controllers;

use common\models\Perfil;
use Yii;
use common\models\PerfilPlano;
use common\models\PerfilPlanoSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PerfilPlanoController implements the CRUD actions for PerfilPlano model.
 */
class PerfilPlanoController extends Controller
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
     * Lists all PerfilPlano models.
     * @return mixed
     */

    public function actionIndex()
    {
        $perfilPlano_searchModel = new PerfilPlanoSearch();
        $perfilPlanos_dataProvider = $perfilPlano_searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'perfilPlano_searchModel' => $perfilPlano_searchModel,
            'perfilPlanos_dataProvider' => $perfilPlanos_dataProvider,
        ]);
    }

    /**
     * Displays a single PerfilPlano model.
     * @param integer $IDperfil
     * @param integer $IDplano
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IDperfil, $IDplano)
    {
        return $this->render('view', [
            'model' => $this->findModel($IDperfil, $IDplano),
        ]);
    }

    /**
     * Creates a new PerfilPlano model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // variável usada para a verificação da existência do perfil
        $perfilExiste = false;

        // Instanciar modelo e tentar popula-lo
        $model = new PerfilPlano();
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

        // Se o perfil existe e os dados foram validados -> gravar na base de dados e redirecionar para a view do perfilplano criado
        if ($perfilExiste == true && $model->validate()) {
            $model->save();
            return $this->redirect(['view', 'IDperfil' => $model->IDperfil, 'IDplano' => $model->IDplano]);
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
     * Updates an existing PerfilPlano model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $IDperfil
     * @param integer $IDplano
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($IDperfil, $IDplano)
    {
        $model = $this->findModel($IDperfil, $IDplano);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IDperfil' => $model->IDperfil, 'IDplano' => $model->IDplano]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PerfilPlano model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $IDperfil
     * @param integer $IDplano
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IDperfil, $IDplano)
    {
        $this->findModel($IDperfil, $IDplano)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PerfilPlano model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $IDperfil
     * @param integer $IDplano
     * @return PerfilPlano the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IDperfil, $IDplano)
    {
        if (($model = PerfilPlano::findOne(['IDperfil' => $IDperfil, 'IDplano' => $IDplano])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
