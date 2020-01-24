<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="definicoes-form">


<?php $form = ActiveForm::begin(); ?>

    <div class="col-md-6 col-md-offset-3">
        <?php $modelPerfil->username = $modelUser->username ?>
        <?= $form->field($modelPerfil, 'username')->textInput() ?>
        <div class="row">
            <div class="col-md-3">
                <?= $form->field($modelPerfil, 'peso')->textInput()->label('Peso (Kg)') ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($modelPerfil, 'altura')->textInput()->label('Altura (cm)') ?>
            </div>
        </div>

        <span class="text-consulta">Alterar Password <strong>(Opcional)</strong></span>
        <div class="border-consulta">
            <?= $form->field($modelPerfil, 'pass_antiga')->passwordInput()->label('Password Antiga') ?>
            <?= $form->field($modelPerfil, 'pass_nova')->passwordInput()->label('Nova Password') ?>
            <?= $form->field($modelPerfil, 'pass_confirmar')->passwordInput()->label('Confirmar Nova Password') ?>
        </div>
        <span style="float:right;">
            <?= Html::submitButton('Gravar', ['class' => 'btn btn-verde']) ?>
            <?= Html::a('Cancelar', ['definicoes/index'], [
                'class' => 'btn btn-vermelho',
                'date-confirm' => 'Deseja gravar as alterações?'
                ]) ?>
        </span>
    </div>

    <?php ActiveForm::end(); ?>

</div>

