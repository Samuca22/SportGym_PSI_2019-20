<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- $form->field($model, 'IDperfil')->textInput()  -->

    <?= $form->field($modelUser, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($modelUser, 'email') ?>

    <?= $form->field($modelUser, 'password')->passwordInput() ?>

    <?= $form->field($modelPerfil, 'IDperfil')->textInput() ?>

    <?= $form->field($modelPerfil, 'nSocio')->textInput() ?>

    <?= $form->field($modelPerfil, 'primeiroNome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelPerfil, 'apelido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelPerfil, 'nif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelPerfil, 'genero')->dropDownList(['M' => 'M', 'F' => 'F',], ['prompt' => '']) ?>

    <?= $form->field($modelPerfil, 'telefone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelPerfil, 'dtaNascimento')->textInput() ?>

    <?= $form->field($modelPerfil, 'rua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelPerfil, 'localidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelPerfil, 'cp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelPerfil, 'peso')->textInput() ?>

    <?= $form->field($modelPerfil, 'altura')->textInput() ?>

    <?= $form->field($modelPerfil, 'foto')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>