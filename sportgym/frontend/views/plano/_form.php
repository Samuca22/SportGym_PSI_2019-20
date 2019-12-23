<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Plano */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plano-form">

    <?php if ($model->treino == 1) {
        echo 'Plano de Treino ';

    } else {
        echo 'Plano de Nutrição ';
    }
    ?>
    <br>
    <br>

    <?php $form = ActiveForm::begin(); ?>


    <?php if ($model->descricao == null) { ?>
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
    <?php } else { ?>
        <?=
        $form->field($model, 'descricao')->textarea(['maxlength' => true, 'style' => 'resize:none;width:500px;height:700px'])
        ?>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-azul']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>