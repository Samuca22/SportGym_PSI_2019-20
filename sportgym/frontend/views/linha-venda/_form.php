<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LinhaVenda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="linha-venda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <?= $form->field($model, 'subTotal')->textInput() ?>

<<<<<<< HEAD
    <?= $form->field($model, 'IDvenda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IDproduto')->textInput(['maxlength' => true]) ?>
=======
    <?= $form->field($model, 'IDvenda')->textInput() ?>

    <?= $form->field($model, 'IDproduto')->textInput() ?>
>>>>>>> Ricardo_API

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
