<?php

namespace frontend\controllers;

use Yii;
use common\models\Perfil;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DefinicoesController implements the CRUD actions for Perfil model.
 */
class DefinicoesController extends Controller
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

    public function actionIndex($id)
    {
        $user = Yii::$app->user->identity;
        $modelUser = User::find()->where(['id' => $id])->one();

        return $this->render('index' , [
            'model' => $this->findModel($id),
            'modelUser' => $modelUser,
            'user' => $user,
        ]);
    }

    public function actionUpdate($id)
    {
        $user = Yii::$app->user->identity;
        $model = Perfil::findOne($id);
        $modelUser = User::find()->where(['id' => $id])->one();

        //Não grava nada sem ser o "Peso" do perfil
        
        if ($modelUser->load(Yii::$app->request->post()) && $modelUser->validate() && $model->load(Yii::$app->request->post()) && $model->validate()) {
            $modelUser->email = $model->email;
            $modelUser->save();
            $model->save();

            return $this->redirect(['index', 'id' => $model->IDperfil]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelUser' => $modelUser,
            'user' => $user,
        ]);
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
