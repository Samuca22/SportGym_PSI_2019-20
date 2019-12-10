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

    <?php // $form->field($model, 'IDproduto') ?>

    <?= $form->field($model, 'global') ?>

    <?php // $form->field($model, 'fotoProduto') ?>

    <?php //$form->field($model, 'descricao') ?>

    <?php //$form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'precoProduto') ?>

    <?php // echo $form->field($model, 'IDlinhaVenda') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
