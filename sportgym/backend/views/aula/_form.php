<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Aula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dtaInicio')->textInput() ?>

    <?= $form->field($model, 'duracao')->textInput() ?>

    <?= $form->field($model, 'IDperfil')->textInput() ?>

    <?= $form->field($model, 'IDginasio')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
