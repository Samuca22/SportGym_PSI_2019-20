<?php

namespace frontend\controllers;

<<<<<<< HEAD
use common\models\PerfilAula;
use common\models\PerfilPlano;
use common\models\User;
use Yii;
use common\models\Plano;
use common\models\PlanoSearch;
=======
use Yii;
use common\models\Plano;
>>>>>>> Ricardo_API
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlanoController implements the CRUD actions for Plano model.
 */
class PlanoController extends Controller
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
     * Lists all Plano models.
     * @return mixed
     */
<<<<<<< HEAD

    /**
     * Displays a single Plano model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionIndex()
    {

        $user = Yii::$app->user->identity;
        $query = PerfilPlano::find()->where(['IDperfil' => $user->id]);

        $plano_searchModel = new PlanoSearch();
       // $plano_dataProvider = $treino_searchModel->search(Yii::$app->request->queryParams);


        $planos_dataProvider = new ActiveDataProvider ([
            'query' => $query,
        ]);

        $plano_dataProvider = $planos_dataProvider;

        return $this->render('index', [
            'plano_searchModel' => $plano_searchModel,
            'plano_dataProvider' => $plano_dataProvider,
        ]);

    }

    /**
     * Creates a new Plano model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
=======
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Plano::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Plano model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
>>>>>>> Ricardo_API
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

<<<<<<< HEAD


=======
    /**
     * Creates a new Plano model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
>>>>>>> Ricardo_API
    public function actionCreate()
    {
        $model = new Plano();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDplano]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Plano model.
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
            return $this->redirect(['view', 'id' => $model->IDplano]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Plano model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
<<<<<<< HEAD
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IDperfil, $IDplano)
    {
        PerfilPlano::findOne($IDperfil, $IDplano)->delete();
=======
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
>>>>>>> Ricardo_API

        return $this->redirect(['index']);
    }

    /**
     * Finds the Plano model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
<<<<<<< HEAD
     * @param string $id
=======
     * @param integer $id
>>>>>>> Ricardo_API
     * @return Plano the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Plano::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
