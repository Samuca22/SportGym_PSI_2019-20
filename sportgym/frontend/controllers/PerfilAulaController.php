<?php

namespace frontend\controllers;

use Yii;
use common\models\PerfilAula;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
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

    public function actionDelete($IDaula)
    {
        $model = PerfilAula::findOne(['IDaula' => $IDaula, 'IDperfil' => Yii::$app->user->getId()]);
        if (Yii::$app->user->can('cancelarInscricaoAula')) {
            if($model != null)
            {
                $model->delete();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Error');
            }
            
        } else {
            Yii::$app->getSession()->setFlash('error', 'Se pretende cancelar uma inscrição desloque-se ao seu clube');
        }


        return $this->redirect(['index']);
    }
}
