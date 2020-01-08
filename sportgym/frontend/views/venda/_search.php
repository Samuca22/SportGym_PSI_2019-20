<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VendaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venda-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= $form->field($model, 'globalFrontend')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Nº venda ou Data (aaaa-mm-dd)'])->label(false) ?>
    <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-azul', 'style' => 'float:right;']) ?>

    <?php ActiveForm::end(); ?>

</div>