<?php

use common\models\Ginasio;
use yii\helpers\ArrayHelper;
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
                    <img src="<?= $modelPerfil->mostrarImagem() ?>" width="200" height="200">
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($modelPerfil, 'primeiroNome')->textInput(['maxlength' => true, 'placeholder' => 'João']) ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($modelPerfil, 'apelido')->textInput(['maxlength' => true, 'placeholder' => 'Martins']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($modelPerfil, 'dtaNascimento')->textInput(['placeholder' => 'aaaa-mm-dd']) ?>
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
                <div class="col-md-12">
                    <?= $form->field($modelUser, 'email')->textInput(['placeholder' => ' joao.marques@gmail.com']) ?>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($modelPerfil, 'telefone')->textInput(['maxlength' => true, 'placeholder' => '912345678']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($modelPerfil, 'nif')->textInput(['maxlength' => true, 'placeholder' => '218345697']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($modelPerfil, 'rua')->textInput(['maxlength' => true, 'placeholder' => 'estrada da ribeira, nº123']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($modelPerfil, 'localidade')->textInput(['maxlength' => true, 'placeholder' => 'Leiria']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($modelPerfil, 'cp')->textInput(['maxlength' => true, 'placeholder' => '1234-567']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($modelAdesao, 'IDginasio')->dropDownList(
                                    ArrayHelper::map(Ginasio::find()->all(), 'IDginasio', 'localidade'),
                                    [
                                        'prompt' => 'Selecione o ginásio',
                                        'class' => 'form-control',
                                    ]
                                ) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <?= $form->field($modelPerfil, 'file')->fileInput() ?>
                </div>
                <div class="col-md-4">
                    <div style="float:right;margin-top:20px;">
                        <?= Html::submitButton('Inscrever Sócio', ['class' => 'btn btn-azul']) ?>
                        <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-vermelho']) ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>