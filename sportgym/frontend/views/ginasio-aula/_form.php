<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GinasioAula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ginasio-aula-form">

    <?php $form = ActiveForm::begin(); ?>

<<<<<<< HEAD
    <?= $form->field($model, 'IDginasio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IDaula')->textInput(['maxlength' => true]) ?>
=======
    <?= $form->field($model, 'IDginasio')->textInput() ?>

    <?= $form->field($model, 'IDaula')->textInput() ?>
>>>>>>> Ricardo_API

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
