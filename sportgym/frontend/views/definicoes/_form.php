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
        <?php $model->email = $modelUser->email ?> 
        <?= $form->field($model, 'email')->textInput() ?>
        <?= $form->field($modelUser, 'username')->textInput() ?>
        <?= $form->field($modelUser, 'password_hash')->passwordInput() ?>
        <div class="row">
            <div class="col-md-2">
                <?= $form->field($model, 'peso')->textInput() ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'altura')->textInput() ?>
            </div>
        </div>
        <span style="float:right;">
            <?= Html::submitButton('Gravar', ['class' => 'btn btn-verde']) ?>
            <?= Html::a('Cancelar', ['definicoes/index'], ['class' => 'btn btn-vermelho']) ?>
        </span>
    </div>
</div>

<?php ActiveForm::end(); ?>