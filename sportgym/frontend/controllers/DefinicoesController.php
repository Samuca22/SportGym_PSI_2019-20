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

    public function actionIndex()
    {
        $user = Yii::$app->user->identity;
        $modelUser = User::findOne(['id' => $user->getId()]);

        return $this->render('index', [
            'model' => $this->findModel($user->getId()),
            'modelUser' => $modelUser,
            'user' => $user,
        ]);
    }

    public function actionUpdate($id)
    {
        $user = Yii::$app->user->identity;
        $modelPerfil = Perfil::findOne($id);
        $modelUser = User::findOne(['id' => $id]);

        if ($modelPerfil->load(Yii::$app->request->post())) {
            $modelPerfil->save(false);
            $modelUser->username = $modelPerfil->username;
            $modelUser->save();

            if ($modelPerfil->pass_antiga != null && $modelPerfil->pass_nova != null && $modelPerfil->pass_confirmar != null) {
                if ($modelUser->validatePassword($modelPerfil->pass_antiga)) {
                    if($modelPerfil->validate(array('pass_nova')) && $modelPerfil->validate(array('pass_confirmar'))){
                        $modelUser->setPassword($modelPerfil->pass_nova);
                        $modelUser->save();
                    }
                } else {
                    Yii::$app->getSession()->setFlash('error', 'Não foi possível alterar a password');
                }
            }
            return $this->render('index', [
                'model' => $this->findModel($user->getId()),
                'modelUser' => $modelUser,
                'user' => $user,
            ]);
        }


        return $this->render('update', [
            'modelPerfil' => $modelPerfil,
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
