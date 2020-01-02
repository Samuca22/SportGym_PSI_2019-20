<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilAula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-aula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IDperfil')->textInput() ?>

<<<<<<< HEAD
    <?= $form->field($model, 'IDaula')->textInput(['maxlength' => true]) ?>
=======
    <?= $form->field($model, 'IDaula')->textInput() ?>
>>>>>>> Ricardo_API

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
