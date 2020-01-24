<?php

namespace frontend\controllers;

use common\models\Perfil;
use Yii;
use common\models\PerfilPlano;
use common\models\PerfilPlanoSearch;
use common\models\Plano;
use yii\data\ActiveDataProvider;
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
        $user = Yii::$app->user->identity;

        $plano_searchModel = new PerfilPlanoSearch();
        $planos_dataProvider = $plano_searchModel->search(Yii::$app->request->queryParams);
        $planos_dataProvider->query->andWhere(['perfilplano.IDperfil' => $user->getId()]);


        return $this->render('index', [
            'plano_searchModel' => $plano_searchModel,
            'plano_dataProvider' => $planos_dataProvider,
        ]);
    }

    /**
     * Displays a single PerfilPlano model.
     * @param integer $IDperfil
     * @param string $IDplano
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IDplano)
    {
        $model = Plano::findOne([$IDplano]);
        return $this->render('view', [
            'model' => $model,
        ]);
    }


    public function actionCreate()
    {
        $user = Yii::$app->user->identity;
        $model = new Plano();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($model->save()) {
                $model->nome = $user->username . $model->IDplano . '_' . $model->nome;
                $modelPerfilPlano = new PerfilPlano();
                $modelPerfilPlano->IDperfil = $user->getId();
                $modelPerfilPlano->IDplano = $model->IDplano;
                $modelPerfilPlano->nSocio = $user->perfil->nSocio;
                $modelPerfilPlano->dtaplano = date('Y-m-d');


                if ($modelPerfilPlano->validate()) {
                    $modelPerfilPlano->save();
                    Yii::$app->getSession()->setFlash('success', 'Plano criado com sucesso');
                    return $this->redirect(['index']);
                } else {
                    Yii::$app->getSession()->setFlash('error', 'Erro');
                    return $this->redirect(['create']);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($IDplano)
    {
        $model = Plano::findOne($IDplano);
        if (Yii::$app->user->can('alterarPlano')) {
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->save();
                return $this->redirect(['view', 'IDplano' => $model->IDplano]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            Yii::$app->getSession()->setFlash('error', 'Se pretende editar um plano desloque-se ao seu clube');
        }
        return $this->redirect(['view', 'IDplano' => $model->IDplano]);
    }


    /**
     * Deletes an existing PerfilPlano model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $IDperfil
     * @param string $IDplano
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IDplano)
    {
        $this->findModel(Yii::$app->user->getId(), $IDplano)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PerfilPlano model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $IDperfil
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
