<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilPlano */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-plano-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IDperfil')->textInput() ?>

    <?= $form->field($model, 'IDplano')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dtaplano')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
