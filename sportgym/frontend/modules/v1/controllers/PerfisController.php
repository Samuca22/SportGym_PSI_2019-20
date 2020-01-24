<?php

namespace frontend\modules\v1\controllers;

use common\models\User;
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
            'perfil' =>
            [
                'nSocio' => $perfil->nSocio,
                'PrimeiroNome' => $perfil->primeiroNome,
                'Apelido' => $perfil->apelido,
                'Telefone' => $perfil->telefone,
                'DataNascimento' => $perfil->dtaNascimento,
                'Peso' => $perfil->peso,
                'Altura' => $perfil->altura,
            ],

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

        if ($registos == null) {
            return ['Nao existem perfis do sexo feminino'];
        } else {
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

        if ($registos == null) {
            return ['Nao existem perfis do sexo feminino'];
        } else {
            return ['genero' => $registos];
        }
    }

    public function actionTotalFeminino()
    {
        $model = $this->modelClass;
        $registos = $model::find()->where(['genero' => 'F'])->all();

        return ['total-perfis-femininos' => count($registos)];
    }

    public function actionAlterarPesoAltura($id)  //Permite alterar o peso e altura de um dado perfil
    {
        $peso = Yii::$app->request->post('peso');
        $altura = Yii::$app->request->post('altura');
        $model = new $this->modelClass;
        $perfil = $model::findOne($id);


        $perfil->peso = $peso;
        $perfil->altura = $altura;
        $perfil->save();


        return $perfil;
    }

    public function actionAlterarUsername($id)
    {
        $username = Yii::$app->request->post('username');
        $user = User::findOne($id);
        $outroUser = User::find()->where(['username' => $username])->one();

        if($outroUser == null)
        {
            $user->username = $username;
            $user->save();
            return ['username' => $username];
        } else {
            return false;
        }        
    }

    public function actionAlterarPassword($id)
    {
        $password = Yii::$app->request->post('password');
        $password_atual = Yii::$app->request->post('password_atual');
        $user = User::findOne($id);

        if ($user->validatePassword($password_atual)) {
            $user->setPassword($password);
            $user->save(false);
            return ['result' => 'OK'];
        } else {
            return false;
        }        
    }

    public function actionUsername($id)
    {
        $user = User::findOne($id);

        return[
            'username' => $user->username,
        ];
    }

}
