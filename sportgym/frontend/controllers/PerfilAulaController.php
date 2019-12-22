<?php

namespace frontend\controllers;

use common\models\Aula;
use common\models\Perfil;
use Yii;
use common\models\PerfilAula;
use common\models\PerfilAulaSearch;
use yii\data\ActiveDataProvider;
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

        $user = Yii::$app->user->identity;
        $query = PerfilAula::find()->where(['IDperfil' => $user->id]);


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PerfilAula model.
     * @param integer $IDperfil
     * @param string $IDaula
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
        $model = new PerfilAula();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IDperfil' => $model->IDperfil, 'IDaula' => $model->IDaula]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PerfilAula model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $IDperfil
     * @param string $IDaula
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
     * @param string $IDaula
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
     * @param string $IDaula
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
