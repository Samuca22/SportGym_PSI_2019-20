<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDperfil') ?>

    <?= $form->field($model, 'nSocio') ?>

    <?= $form->field($model, 'foto') ?>

    <?= $form->field($model, 'primeiroNome') ?>

    <?= $form->field($model, 'apelido') ?>

    <?php // echo $form->field($model, 'genero') ?>

    <?php // echo $form->field($model, 'telefone') ?>

    <?php // echo $form->field($model, 'dtaNascimento') ?>

    <?php // echo $form->field($model, 'rua') ?>

    <?php // echo $form->field($model, 'localidade') ?>

    <?php // echo $form->field($model, 'cp') ?>

    <?php // echo $form->field($model, 'nif') ?>

    <?php // echo $form->field($model, 'peso') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
