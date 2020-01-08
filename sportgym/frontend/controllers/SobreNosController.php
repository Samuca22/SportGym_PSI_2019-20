<?php


namespace frontend\controllers;


use yii\web\Controller;

class SobreNosController extends Controller

{

    public function actionIndex()
    {
        return $this->render('index');
    }

}