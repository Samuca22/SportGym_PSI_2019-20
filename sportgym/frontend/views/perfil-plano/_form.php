<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilPlano */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-plano-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Musculação/Emagrecimento']) ?>

    <?= $form->field($model, 'tipo')->dropDownList(
        [
            0 => 'Treino',
            1 => 'Nutrição',
        ],
        [
            'prompt' => 'Selecione o tipo de plano',
        ],
        [

            'class' => 'form-control'
        ]
    ) ?>

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

    <div class="form-group">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-azul']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
