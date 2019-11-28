<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GinasioAula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ginasio-aula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IDginasio')->textInput() ?>

    <?= $form->field($model, 'IDaula')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
