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

<<<<<<< HEAD
    <?= $form->field($model, 'IDperfil') ?>

    <?= $form->field($model, 'nSocio') ?>

    <?= $form->field($model, 'foto') ?>

    <?= $form->field($model, 'primeiroNome') ?>

    <?= $form->field($model, 'apelido') ?>
=======
    <?= $form->field($model, 'global')->textInput(['maxLength' => true, 'class' => 'form-control form-criar']) ?>

    <?php //$form->field($model, 'nSocio') ?>

    <?php //$form->field($model, 'foto') ?>

    <?php //$form->field($model, 'primeiroNome') ?>

    <?php //$form->field($model, 'apelido') ?>
>>>>>>> 01ecfc65fd6ad76efe51d54fca8ec2b0ef4169f1

    <?php // echo $form->field($model, 'genero') ?>

    <?php // echo $form->field($model, 'telefone') ?>

    <?php // echo $form->field($model, 'dtaNascimento') ?>

    <?php // echo $form->field($model, 'rua') ?>

    <?php // echo $form->field($model, 'localidade') ?>

    <?php // echo $form->field($model, 'cp') ?>

    <?php // echo $form->field($model, 'nif') ?>

    <?php // echo $form->field($model, 'peso') ?>

<<<<<<< HEAD
    <?php // echo $form->field($model, 'altura') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
=======
    <div class="form-group">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-procurar']) ?>
        <?php //echo Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
>>>>>>> 01ecfc65fd6ad76efe51d54fca8ec2b0ef4169f1
    </div>

    <?php ActiveForm::end(); ?>

</div>
