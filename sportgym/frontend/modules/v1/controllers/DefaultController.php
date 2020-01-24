<?php

namespace frontend\modules\v1\controllers;

use common\models\Perfil;
use common\models\User;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\Controller as RestController;

/**
 * Default controller for the `v1` module
 */
class DefaultController extends RestController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => function ($email_username, $password) {
                $user = User::findByUsername($email_username);
                if ($user == null) {
                    $user = User::findByEmail($email_username);
                }
                if ($user && $user->validatePassword($password)) {
                    return $user;
                }
                return null;
            }
        ];
        return
            $behaviors;
    }



    public function actionIndex()
    {
        $perfil = Perfil::findOne(Yii::$app->user->getId());
        return [
            'id' => Yii::$app->user->getId(),
            'access_token' => Yii::$app->user->identity->getAuthKey(),
            'nSocio' => $perfil->nSocio,
            'PrimeiroNome' => $perfil->primeiroNome,
            'Apelido' => $perfil->apelido,
            'Telefone' => $perfil->telefone,
            'DataNascimento' => $perfil->dtaNascimento,
            'Peso' => $perfil->peso,
            'Altura' => $perfil->altura,
            'Foto' => base64_encode($perfil->foto),
        ];
    }
}
