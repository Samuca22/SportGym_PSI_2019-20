<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'SportGym';
?>
<div class="text-center">
    <img src="/imgs/logo.png" width="250">
</div>

<div class="caixa-login">
    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control']) ?>

            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control']) ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-login', 'name' => 'login-button', 'id' => 'button-login']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>