<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Produto */

$this->title = 'Update Produto: ' . $model->IDproduto;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDproduto, 'url' => ['view', 'id' => $model->IDproduto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="produto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
