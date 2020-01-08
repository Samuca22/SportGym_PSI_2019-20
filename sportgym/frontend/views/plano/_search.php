<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PlanoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plano-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <?= $form->field($model, 'nome')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>

    <div class="form-group">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-azul']) ?>
        <!-- Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) -->
    </div>

    <?php ActiveForm::end(); ?>

</div>
