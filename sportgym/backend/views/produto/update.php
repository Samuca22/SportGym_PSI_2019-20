<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Produto */

$this->title = $model->nome;
?>
<div class="produto-update">


    <h4>Atualizar Dados: <?= $model->nome ?></h4>
    <hr class="hr">
    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
