<?php

namespace frontend\modules\v1\controllers;

use Yii;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;


/**
 * Default controller for the `v1` module
 */
class PerfisController extends ActiveController
{
    public $modelClass = 'common\models\Perfil';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
        ];
        return $behaviors;
    }

    public function actionEnviarDados($id)  //Envia um conjunto de dados selecionados de um dado perfil registado
    {
        $model = $this->modelClass;
        $perfil = $model::findOne($id);

        return [
            'PrimeiroNome' => $perfil->primeiroNome,
            'Apelido' => $perfil->apelido,
            'Telefone' => $perfil->telefone,
            'DataNascimento' => $perfil->dtaNascimento,
            'Peso' => $perfil->peso,
            'Altura' => $perfil->altura
        ];
    }

    public function actionTotal()   //Retorna o total (count) de perfis registados na base da dados
    {
        $model = new $this->modelClass;
        $registos = $model::find()->all();

        return ['total' => count($registos)];
    }

    public function actionPerfisSexoMasculino() //Retorna todos os perfis que têm o género masculino
    {
        $model = $this->modelClass;
        $registos = $model::find()->where(['genero' => 'M'])->all();

        if($registos == null)
        {
            return ['Nao existem perfis do sexo feminino'];
        }
        else
        {
            return ['genero' => $registos];
        }
    }

    public function actionTotalMasculino()
    {
        $model = $this->modelClass;
        $registos = $model::find()->where(['genero' => 'M'])->all();

        return ['total-perfis-masculinos' => count($registos)];
    }

    public function actionPerfisSexoFeminino()  //Retorna todos os perfis que têm o género feminino
    {
        $model = $this->modelClass;
        $registos = $model::find()->where(['genero' => 'F'])->all();

        if($registos == null)
        {
            return ['Nao existem perfis do sexo feminino'];
        }
        else
        {
            return ['genero' => $registos];
        }
    }

    public function actionTotalFeminino()
    {
        $model = $this->modelClass;
        $registos = $model::find()->where(['genero' => 'F'])->all();

        return ['total-perfis-femininos' => count($registos)];
    }

    public function actionAlterarPeso($id)  //Permite alterar o peso de um dado perfil
    {
        $peso = \Yii::$app->request->post('peso');
        $model = new $this->modelClass;
        $perfil = $model::findOne($id);


        $perfil->peso = $peso;
        $perfil->save();


        return $perfil;
    }

    public function actionAlterarAltura($id)    //Permite alterar a altura de um dado perfil
    {
        $altura = Yii::$app->request->post('altura');
        $model = new $this->modelClass;
        $perfil = $model::findOne($id);


        $perfil->altura = $altura;
        $perfil->save();

        return $perfil;
    }
}
