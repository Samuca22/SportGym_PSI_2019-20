<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Adesao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adesao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dtaInicio')->textInput() ?>

    <?= $form->field($model, 'dtaFim')->textInput() ?>

    <?= $form->field($model, 'IDginasio')->textInput() ?>

    <?= $form->field($model, 'IDperfil')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
