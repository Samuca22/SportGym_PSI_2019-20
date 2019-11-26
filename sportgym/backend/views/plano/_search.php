<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PlanoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plano-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDplano') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'nutricao') ?>

    <?= $form->field($model, 'treino') ?>

    <?= $form->field($model, 'descricao') ?>

    <?php // echo $form->field($model, 'IDperfil') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
