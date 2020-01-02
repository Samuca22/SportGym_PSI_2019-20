<?php

namespace frontend\controllers;

use Yii;
use common\models\LinhaVenda;
<<<<<<< HEAD
use common\models\LinhaVendaSearch;
=======
use yii\data\ActiveDataProvider;
>>>>>>> Ricardo_API
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LinhaVendaController implements the CRUD actions for LinhaVenda model.
 */
class LinhaVendaController extends Controller
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
     * Lists all LinhaVenda models.
     * @return mixed
     */
    public function actionIndex()
    {
<<<<<<< HEAD
        $searchModel = new LinhaVendaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
=======
        $dataProvider = new ActiveDataProvider([
            'query' => LinhaVenda::find(),
        ]);

        return $this->render('index', [
>>>>>>> Ricardo_API
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LinhaVenda model.
<<<<<<< HEAD
     * @param string $id
=======
     * @param integer $id
>>>>>>> Ricardo_API
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new LinhaVenda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LinhaVenda();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDlinhaVenda]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LinhaVenda model.
     * If update is successful, the browser will be redirected to the 'view' page.
<<<<<<< HEAD
     * @param string $id
=======
     * @param integer $id
>>>>>>> Ricardo_API
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDlinhaVenda]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LinhaVenda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
<<<<<<< HEAD
     * @param string $id
=======
     * @param integer $id
>>>>>>> Ricardo_API
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LinhaVenda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
<<<<<<< HEAD
     * @param string $id
=======
     * @param integer $id
>>>>>>> Ricardo_API
     * @return LinhaVenda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LinhaVenda::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
