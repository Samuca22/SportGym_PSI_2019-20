<?php

use common\models\Plano;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Plano */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plano-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Musculação/Emagrecimento']) ?>

    <?php
    if ($model->treino == 1) {
        $model->tipo = 0;
    }
    if ($model->treino == 1) {
        $model->tipo = 1;
    }
    if ($model->nutricao == 1) {
        $model->tipo = 2;
    }
    ?>

    <?= $form->field($model, 'tipo')->dropDownList(
        [
            1 => 'Treino',
            2 => 'Nutrição',
        ],
        [
            'prompt' => 'Selecione o tipo de plano',
            'options' => [
                $model->tipo => ['Selected' => true],
            ],
        ],
        [

            'class' => 'form-control'
        ]
    ) ?>


    <?php if($model->descricao == null){ ?>
    <?= $form->field($model, 'descricao')->textarea([
        'maxlength' => true, 'style' => 'resize:none;width:500px;height:700px;overflow-y:auto;',
        'value' => 'Nome Plano - Objetivo

        PEQUENO-ALMOÇO
        leite com aveia OU ovos com batatas
    
        LANCHE DA MANHÃ
        Pão com atum

        ALMOÇO
        Batata doce com arroz com um peito de frango
    
        LANCHA DA TARDE
        Pão com cebola e maionese
    
        JANTAR
        Batata salgada com massa e salmão
    
        CEIA
        Shake',

        'class' => 'form-control'
    ]) ?>
    <?php } else{ ?>
        <?=
        $form->field($model, 'descricao')->textarea(['maxlength' => true, 'style' => 'resize:none;width:500px;height:700px'])
        ?>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-azul']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>