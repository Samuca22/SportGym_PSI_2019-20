<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Produto */

$this->title = 'Criar Produto';
?>
<div class="produto-create">

    <h4>Criar Produto</h4>
    <hr class="hr">
    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
