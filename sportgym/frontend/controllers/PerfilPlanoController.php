<?php

namespace frontend\controllers;

use Yii;
use common\models\PerfilPlano;
<<<<<<< HEAD
use common\models\PerfilPlanoSearch;
=======
>>>>>>> Ricardo_API
use yii\data\ActiveDataProvider;
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
<<<<<<< HEAD

        $user = Yii::$app->user->identity;
        $query = PerfilPlano::find()->where(['IDperfil' => $user->id]);


        $searchModel = new PerfilPlanoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $plano_dataProvider = new ActiveDataProvider ([
            'query' => $query,
        ]);

        $dataProvider = $plano_dataProvider;

        return $this->render('index', [
            'searchModel' => $searchModel,
=======
        $dataProvider = new ActiveDataProvider([
            'query' => PerfilPlano::find(),
        ]);

        return $this->render('index', [
>>>>>>> Ricardo_API
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PerfilPlano model.
     * @param integer $IDperfil
<<<<<<< HEAD
     * @param string $IDplano
=======
     * @param integer $IDplano
>>>>>>> Ricardo_API
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
        $model = new PerfilPlano();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IDperfil' => $model->IDperfil, 'IDplano' => $model->IDplano]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PerfilPlano model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $IDperfil
<<<<<<< HEAD
     * @param string $IDplano
=======
     * @param integer $IDplano
>>>>>>> Ricardo_API
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
<<<<<<< HEAD
     * @param string $IDplano
=======
     * @param integer $IDplano
>>>>>>> Ricardo_API
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
<<<<<<< HEAD
     * @param string $IDplano
=======
     * @param integer $IDplano
>>>>>>> Ricardo_API
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
