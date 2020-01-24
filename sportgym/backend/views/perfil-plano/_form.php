<?php

use Codeception\Command\Shared\Style;
use common\models\Plano;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilPlano */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-plano-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelPerfilPlano, 'nSocio')->textInput(['class' => 'form-control', 'placeholder' => '1000']) ?>


    <?= $form->field($modelPerfilPlano, 'IDplano')->dropDownList(
        ArrayHelper::map(Plano::find()->orderBy(['nome' => SORT_ASC])->all(), 'IDplano', 'nome'),
        [
           'prompt' => 'Selecione um plano',
           'class' => 'form-control',
        ]
    ) ?>

    <?= $form->field($modelPerfilPlano, 'dtaplano')->textInput(['class' => 'form-control', 'placeholder' => 'aaaa-mm-dd'])->label('Data de Atribuição') ?>

    <div class="form-group">
        <?= Html::submitButton('Atribuir Plano', ['class' => 'btn btn-azul']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>