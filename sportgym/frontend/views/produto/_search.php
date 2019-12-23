<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProdutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row" style="position:relative;margin-bottom:20px;">
        <div class="col-md-8"></div>
        <div class="col-md-3">
            <?= $form->field($model, 'nome')->textInput(['placeholder' => "Pesquisar", 'style' => 'float:left;']) ?>
        </div>
        <div class="col-md-1" style="position:absolute;bottom:0;float:right;right:0;padding:0;">
            <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-azul']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>