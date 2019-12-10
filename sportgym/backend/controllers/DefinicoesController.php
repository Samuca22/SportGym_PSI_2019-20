<?php


namespace backend\controllers;


use common\models\Ginasio;

use common\models\GinasioSearch;
use common\models\Perfil;
use common\models\Venda;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use Yii;


class DefinicoesController extends  Controller
{

    public function actionIndexGinasio()
    {
        $ginasio_searchModel = new GinasioSearch();
        $ginasio_dataProvider = $ginasio_searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-ginasio', [
            'ginasio_searchModel' => $ginasio_searchModel,
            'ginasio_dataProvider' => $ginasio_dataProvider,
        ]);
    }

    public function actionIndexUtilizador()
    { 
            
    }
}
