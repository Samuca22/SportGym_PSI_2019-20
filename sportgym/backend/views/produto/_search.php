<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProdutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDproduto') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'fotoProduto') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'precoProduto') ?>

    <?php // echo $form->field($model, 'IDlinhaVenda') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
