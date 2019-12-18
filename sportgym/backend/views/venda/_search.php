<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VendaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venda-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'global')->textInput(['class' => 'form-control form-pesquisa', 'placeholder' => 'AAAA-MM-DD  ou  Joana Silva']) ?>

    <div class="form-group">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-azul']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
