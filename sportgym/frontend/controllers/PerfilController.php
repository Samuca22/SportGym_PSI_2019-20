<?php

namespace frontend\controllers;

use Yii;
use common\models\Perfil;
<<<<<<< HEAD
use common\models\PerfilSearch;
use common\models\User;
use common\models\Venda;
=======
use yii\data\ActiveDataProvider;
>>>>>>> Ricardo_API
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
<<<<<<< HEAD
        $searchModel = new PerfilSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
=======
        $dataProvider = new ActiveDataProvider([
            'query' => Perfil::find(),
        ]);

        return $this->render('index', [
>>>>>>> Ricardo_API
            'dataProvider' => $dataProvider,
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
<<<<<<< HEAD
        //Permite mostrar dados da tabela User
        $modelUser = User::find()->where(['id' => $id])->one();

        $modelVenda = Venda::find()->where(['IDperfil' => $id])->one();

        return $this->render('view', [
            'modelPerfil' => $this->findModel($id),
            'modelUser' => $modelUser,
            'modelVenda' => $modelVenda,
=======
        return $this->render('view', [
            'model' => $this->findModel($id),
>>>>>>> Ricardo_API
        ]);
    }

    /**
     * Creates a new Perfil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Perfil();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDperfil]);
        }

        return $this->render('create', [
            'model' => $model,
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
<<<<<<< HEAD
        $modelUser = User::findOne($id);
        $model = $this->findModel($id);

        /*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDperfil]);
        }*/

        return $this->render('update', [
            'model' => $model,
            'modelUser' => $modelUser,
=======
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDperfil]);
        }

        return $this->render('update', [
            'model' => $model,
>>>>>>> Ricardo_API
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
        $this->findModel($id)->delete();

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
