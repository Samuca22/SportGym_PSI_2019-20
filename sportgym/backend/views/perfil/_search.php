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

    <?= $form->field($model, 'global')->textInput(['maxLength' => true, 'class' => 'form-control form-criar']) ?>

    <?php //$form->field($model, 'nSocio') ?>

    <?php //$form->field($model, 'foto') ?>

    <?php //$form->field($model, 'primeiroNome') ?>

    <?php //$form->field($model, 'apelido') ?>

    <?php // echo $form->field($model, 'genero') ?>

    <?php // echo $form->field($model, 'telefone') ?>

    <?php // echo $form->field($model, 'dtaNascimento') ?>

    <?php // echo $form->field($model, 'rua') ?>

    <?php // echo $form->field($model, 'localidade') ?>

    <?php // echo $form->field($model, 'cp') ?>

    <?php // echo $form->field($model, 'nif') ?>

    <?php // echo $form->field($model, 'peso') ?>

    <div class="form-group">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-procurar']) ?>
        <?php //echo Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
