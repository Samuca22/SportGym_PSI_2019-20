<?php

namespace frontend\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\web\Controller;

/**
 * Default controller for the `v1` module
 */
class PlanosController extends ActiveController
{
    public $modelClass = 'common\models\Plano';
}
