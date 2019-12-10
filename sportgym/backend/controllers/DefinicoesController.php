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

<<<<<<< HEAD
    public function actioIndex()
    {
        $ginasio_dataProvider = new ActiveDataProvider([
            'query' => Ginasio::find(),
        ]);
=======
>>>>>>> GoncaloAula

    public function actionIndexGinasio()
    {
        $ginasio_searchModel = new GinasioSearch();
        $ginasio_dataProvider = $ginasio_searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-ginasio', [
                'ginasio_searchModel' => $ginasio_searchModel,
                'ginasio_dataProvider' => $ginasio_dataProvider,
        ]);
    }

    public function ActionIndexUtilizador()
    {
        {
            $idPerfil = Yii::$app->user->getId(); //variavel para buscar o id de o perfil logado
            $nomeApresentacao = Perfil::findOne($idPerfil); // variavel para associar o perfil do utilizador logado



            $venda_dataProvider = new ActiveDataProvider([
                'query' => Venda::find()->limit(4)->orderBy(['dataVenda' => SORT_DESC]), // LIMITE DE LINHAS POR TABELA E ORDERNAR POR DATA MAIS RECENTE
                'pagination' => false,  //paginação a 0
            ]);

            $ginasio_dataProvider = new ActiveDataProvider([
                'query' => Ginasio::find(),
            ]);

            return $this->render('index', [
                'venda_dataProvider' => $venda_dataProvider,
                'ginasio_dataProvider' => $ginasio_dataProvider,
                'nomeApresentacao' => $nomeApresentacao,
            ]);
        }
    }

}