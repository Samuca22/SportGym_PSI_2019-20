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
    <?= $form->field($model, 'nome')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Nome do Produto'])->label(false) ?>
    <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-azul', 'style' => 'float:right;']) ?>
    <?php ActiveForm::end(); ?>

</div>