<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GinasioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ginasio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDginasio') ?>

    <?= $form->field($model, 'rua') ?>

    <?= $form->field($model, 'localidade') ?>

    <?= $form->field($model, 'cp') ?>

    <?= $form->field($model, 'telefone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
