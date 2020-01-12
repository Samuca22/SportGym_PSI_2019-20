<?php

namespace frontend\modules\v1\controllers;



use common\models\Produto;
use Yii;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

/**
 * Default controller for the v1 module
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

    public function actions()
    {
        $action = parent::actions();

        return $action;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if (Yii::$app->user->isGuest) {
            throw new ForbiddenHttpException('Apenas poderá ' . $action . ' utilizadores registados…');
        } else {
            if (Yii::$app->user->can('alterarEstadoProdutos')) {
                return true;
            } else {
                throw new ForbiddenHttpException('Sem Permissão');
            }
        }
    }

    public function actionAlterarEstado($id)
    {
        if ($this->checkAccess('')) {
            //$model = new $this->modelClass;
            $record = Produto::findOne(["IDproduto" => $id]);
            $record->alterarEstado();
            $record->save();

            return $record;
        }
    }
}