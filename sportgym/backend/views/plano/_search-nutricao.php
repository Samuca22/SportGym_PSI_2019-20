<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PlanoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plano-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index-nutricao'],
        'method' => 'get',
    ]); ?>
    
    <?= $form->field($model, 'nome')->textInput(['maxlength' => 999, 'class' => 'form-control form-pesquisa']) ?>

    <?php // echo $form->field($model, 'IDperfil') ?>

    <div class="form-group">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-procurar']) ?>
        <!-- Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) -->
    </div>

    <?php ActiveForm::end(); ?>

</div>