<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Produto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row caixa-ver">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="caixa-ver-headers">
                    <?php if ($model->nome == null) : ?>
                            Criar Produto
                        <?php else : ?>
                            Editar Produto
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- textInput alterado para =>fileInput -->
                    <?= $form->field($model, 'nome')->textInput(['maxlength' => true, 'placeholder' => 'Saco de Proteína eXtra 2.5Kg']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'precoProduto')->textInput(['placeholder' => '5 ou 10.99'])->label('Preço(€)') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'descricao')->textarea(['style' => 'resize:none; height: 150px;', 'placeholder' => 'Saco de Proteína eXtra 2.5kg, ideal para o aum........']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <?= $form->field($model, 'file')->fileInput()->label('Fotografia') ?>
                </div>
                <div class="col-md-4" style="margin-top:20px;">
                    <div style="float:right;">
                        <?php if ($model->nome == null) : ?>
                            <?= Html::submitButton('Criar Produto', ['class' => 'btn btn-azul']) ?>
                        <?php else : ?>
                            <?= Html::submitButton('Gravar Alterações', ['class' => 'btn btn-azul']) ?>
                        <?php endif; ?>
                        <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-vermelho']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>