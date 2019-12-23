<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Plano */

$this->title = 'Update Plano: ' . $model->IDplano;
$this->params['breadcrumbs'][] = ['label' => 'Planos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDplano, 'url' => ['view', 'id' => $model->IDplano]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="plano-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
