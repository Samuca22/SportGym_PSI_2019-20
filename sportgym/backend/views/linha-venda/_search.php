<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LinhaVendaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="linha-venda-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDlinhaVenda') ?>

    <?= $form->field($model, 'quantidade') ?>

    <?= $form->field($model, 'subTotal') ?>

    <?= $form->field($model, 'IDvenda') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
