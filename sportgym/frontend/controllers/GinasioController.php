<?php

namespace frontend\controllers;

use common\models\PerfilAula;
use Yii;
use common\models\Ginasio;
use common\models\GinasioSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GinasioController implements the CRUD actions for Ginasio model.
 */
class GinasioController extends Controller
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
     * Lists all Ginasio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $ginasio_dataProvider = new ActiveDataProvider([
            'query' => Ginasio::find(),
        ]);


        return $this->render('index', [
            'ginasio_dataProvider' => $ginasio_dataProvider,
        ]);
    }
}
