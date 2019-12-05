<?php


namespace backend\controllers;

use common\models\Ginasio;
use common\models\GinasioSearch;
use Yii;
use common\models\Adesao;
use common\models\AdesaoSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class DefinicoesController extends  Controller
{

    public function actionIndexdefinicoesgym()
    {
        $ginasio_dataProvider = new ActiveDataProvider([
            'query' => Ginasio::find(),
        ]);

        return $this->render('index', [
            'ginasio_dataProvider' => $ginasio_dataProvider,

        ]);
    }



}