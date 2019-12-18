<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Plano */

$this->title = 'Criar Plano';
?>
<div class="plano-create">

    <h4><?= Html::encode($this->title) ?></h4>
    <hr class="hr">
    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
