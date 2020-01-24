<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-form">

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
            <div class="row">
                <div class="col-md-3">
                    <div>Foto</div>
                    <img src="data:image/png;base64,<?= base64_encode($modelPerfil->foto) ?>" height="200" width="200" />
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($modelPerfil, 'primeiroNome')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($modelPerfil, 'apelido')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($modelPerfil, 'dtaNascimento')->textInput() ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($modelPerfil, 'genero')->dropDownList(['M' => 'Masculino', 'F' => 'Feminino',], ['prompt' => 'Género']) ?>
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
                <div class="col-md-7">
                    <?php $modelPerfil->email = $modelUser->email ?>
                    <?= $form->field($modelPerfil, 'email')->textInput() ?>
                </div>
                <div class="col-md-5">
                    <?= $form->field($modelPerfil, 'estatuto')->dropDownList(
                        [
                            1 => 'Sócio',
                            2 => 'Colaborador',
                            3 => 'Administrador',
                        ],
                        [
                            'class' => 'form-control'
                        ]
                    ) ?>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($modelPerfil, 'telefone')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($modelPerfil, 'nif')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($modelPerfil, 'rua')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($modelPerfil, 'localidade')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($modelPerfil, 'cp')->textInput(['maxlength' => true, 'placeholder' => '1234-567']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <?= $form->field($modelPerfil, 'foto')->fileInput()->label('Fotografia') ?>

                </div>
                <div class="col-md-4">
                    <div style="float:right;margin-top:20px;">
                        <?= Html::submitButton('Gravar', ['class' => 'btn btn-azul']) ?>
                        <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-vermelho']) ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>