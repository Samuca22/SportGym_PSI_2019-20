<?php

namespace frontend\controllers;

use Yii;
use common\models\GinasioAula;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GinasioAulaController implements the CRUD actions for GinasioAula model.
 */
class GinasioAulaController extends Controller
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
     * Lists all GinasioAula models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => GinasioAula::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GinasioAula model.
     * @param integer $IDginasio
     * @param integer $IDaula
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IDginasio, $IDaula)
    {
        return $this->render('view', [
            'model' => $this->findModel($IDginasio, $IDaula),
        ]);
    }

    /**
     * Creates a new GinasioAula model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GinasioAula();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IDginasio' => $model->IDginasio, 'IDaula' => $model->IDaula]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GinasioAula model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $IDginasio
     * @param integer $IDaula
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($IDginasio, $IDaula)
    {
        $model = $this->findModel($IDginasio, $IDaula);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IDginasio' => $model->IDginasio, 'IDaula' => $model->IDaula]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GinasioAula model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $IDginasio
     * @param integer $IDaula
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IDginasio, $IDaula)
    {
        $this->findModel($IDginasio, $IDaula)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GinasioAula model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $IDginasio
     * @param integer $IDaula
     * @return GinasioAula the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IDginasio, $IDaula)
    {
        if (($model = GinasioAula::findOne(['IDginasio' => $IDginasio, 'IDaula' => $IDaula])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
