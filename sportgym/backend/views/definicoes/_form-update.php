<?php

use yii\helpers\Html;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>

<div class="row caixa-ver">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="caixa-ver-headers">
                    Informações Básicas
                </div>
            </div>
        </div>
        <div class="row info">
            <div class="col-md-3">
                <div>Foto</div>
                <img src="data:image/png;base64,<?= base64_encode($perfil->foto) ?>" height="200" width="200" />
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($perfil, 'primeiroNome')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($perfil, 'apelido')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($perfil, 'dtaNascimento')->textInput() ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($perfil, 'genero')->dropDownList(['M' => 'Masculino', 'F' => 'Feminino',], ['prompt' => 'Género']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <?php $perfil->username = $user->username ?>
                        <?= $form->field($perfil, 'username')->textInput() ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="caixa-ver-headers">
                    Informações Adicionais
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php $perfil->email = $user->email ?>
                <?= $form->field($perfil, 'email') ?>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($perfil, 'telefone')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($perfil, 'nif')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($perfil, 'rua')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($perfil, 'localidade')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($perfil, 'cp')->textInput(['maxlength' => true, 'placeholder' => '1234-567']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <?php if ($perfil->foto == null) : ?>
                    <?= $form->field($perfil, 'foto')->fileInput() ?>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <div style=" float:right;">
                    <?= Html::submitButton('Gravar', ['class' => 'btn btn-azul']) ?>
                    <?= Html::a('Cancelar', ['index-utilizador'], ['class' => 'btn btn-vermelho']) ?>
                </div>
            </div>

        </div>

    </div>
</div>



<?php ActiveForm::end(); ?>