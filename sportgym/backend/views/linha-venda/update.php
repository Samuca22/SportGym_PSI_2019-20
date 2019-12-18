<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LinhaVenda */

$this->title = 'Update Linha Venda: ' . $model->IDlinhaVenda;
$this->params['breadcrumbs'][] = ['label' => 'Linha Vendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDlinhaVenda, 'url' => ['view', 'id' => $model->IDlinhaVenda]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="linha-venda-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
