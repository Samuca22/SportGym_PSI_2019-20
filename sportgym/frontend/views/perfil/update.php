<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */
$this->title = 'Definicoes';
?>
<div class="perfil-update">
    <div>
        <h1>Definições</h1>
    </div>
    <hr>

    <?= $this->render('_form', [
        'model' => $model,
        'modelUser' => $modelUser,
    ]) ?>

</div>