<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>

<div class="definicoes-form">

    <div class="col-md-6 col-md-offset-3">
        <?php $modelPerfil->username = $modelUser->username ?>
        <?= $form->field($modelPerfil, 'username')->textInput() ?>
        <?= $form->field($modelPerfil, 'pass_antiga')->textInput()->label('Password Antiga') ?>
        <?= $form->field($modelPerfil, 'pass_nova')->passwordInput()->label('Nova Password') ?>
        <?= $form->field($modelPerfil, 'pass_confirmar')->passwordInput()->label('Confirmar Nova Password') ?>
        <div class="row">
            <div class="col-md-3">
                <?= $form->field($modelPerfil, 'peso')->textInput()->label('Peso (Kg)') ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($modelPerfil, 'altura')->textInput()->label('Altura (cm)') ?>
            </div>
        </div>
        <span style="float:right;">
            <?= Html::submitButton('Gravar', ['class' => 'btn btn-verde']) ?>
            <?= Html::a('Cancelar', ['definicoes/index'], ['class' => 'btn btn-vermelho']) ?>
        </span>
    </div>

</div>

<?php ActiveForm::end(); ?>