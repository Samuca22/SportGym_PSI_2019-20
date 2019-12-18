<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ginasio */

$this->title = 'Novo estabelecimento';
?>
    <h3><?= Html::encode($this->title) ?></h3>
    <hr class="hr">
    <br>

    <?= $this->render('_form-ginasio', [
        'ginasio' => $ginasio,
    ]) ?>

</div>
