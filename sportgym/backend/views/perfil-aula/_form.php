<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilAula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-aula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nSocio')->textInput() ?>

<<<<<<< HEAD
    <?= $form->field($model, 'IDperfil')->textInput() ?>
=======
>>>>>>> GoncaloAula

    <?= $form->field($model, 'IDaula')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
