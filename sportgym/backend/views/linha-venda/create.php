<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LinhaVenda */

$this->title = 'Create Linha Venda';
$this->params['breadcrumbs'][] = ['label' => 'Linha Vendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linha-venda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
