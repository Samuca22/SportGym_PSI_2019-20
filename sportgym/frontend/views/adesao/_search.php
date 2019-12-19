<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AdesaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adesao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDadesao') ?>

    <?= $form->field($model, 'dtaInicio') ?>

    <?= $form->field($model, 'dtaFim') ?>

    <?= $form->field($model, 'IDginasio') ?>

    <?= $form->field($model, 'IDperfil') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
