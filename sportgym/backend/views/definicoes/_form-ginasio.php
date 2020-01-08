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
                <?php if($ginasio->localidade != null): ?>
                    <?= 'Ginásio - ' . $ginasio->localidade ?>
                    <?php else: ?>
                        Novo Estabelecimento
                    <?php endif; ?>
                </div>
            </div>
        </div>
                
        <div class="row">
            <div class="col-md-8">
                <?= $form->field($ginasio, 'email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($ginasio, 'telefone')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <?= $form->field($ginasio, 'rua')->textInput(['maxLenght' => true]) ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($ginasio, 'localidade')->textInput(['maxLenght' => true]) ?>
            </div>
            <div class="col-sm-3">
                <?= $form->field($ginasio, 'cp')->textInput(['maxLenght' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div style="float:right;">
                    <?= Html::submitButton('Gravar', ['class' => 'btn btn-azul', 'name' => 'criar-ginasio-button']) ?>
                    <?= Html::a('Cancelar', ['index-ginasios'], ['class' => 'btn btn-vermelho']) ?>
                </div>
            </div>
        </div>

    </div>


    <?php ActiveForm::end(); ?>