<?php

namespace frontend\modules\v1\controllers;

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

    public function actionTotal()
    {
        $model = new $this->modelClass;
        $registos = $model::find()->all();

        return ['total' => count($registos)];
    }
}
