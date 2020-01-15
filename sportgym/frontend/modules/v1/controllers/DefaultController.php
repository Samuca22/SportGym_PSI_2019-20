<?php

namespace frontend\modules\v1\controllers;

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
            'auth' => function ($username, $password) {
                $user = User::findByUsername($username);
                if ($user && $user->validatePassword($password)) {
                    return $user;
                }
                return null;
            }
        ];
        return
            $behaviors;
    }

    public function actionIndex(){
        
        return[
            'access_token' => Yii::$app->user->identity->getAuthKey(),
        ];
    }
    
    
}
