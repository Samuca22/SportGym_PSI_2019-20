<?php

namespace frontend\modules\v1\controllers;

use Yii;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;


/**
 * Default controller for the `v1` module
 */
class ProdutosController extends ActiveController
{
    public $modelClass = 'common\models\Produto';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
        ];
        return $behaviors;
    }


    public function checkAccess($action, $model = null, $params = [])
    {
        //if ($action === ‘post' or $action === 'delete')
        if ($action === 'delete')
            if (!Yii::$app->user->can('entrarBack'))
                throw new \yii\web\ForbiddenHttpException('Apenas poderá ' . $action . ' utilizadores admin');
    }
}
