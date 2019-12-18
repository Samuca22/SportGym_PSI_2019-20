<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */

$this->title = 'Criar Perfil';
?>
<div class="perfil-create">

    <h4><?= Html::encode($this->title) ?></h4>
    <hr class="hr">
    <br>

    <?= $this->render('_form-create', [
        'modelPerfil' => $modelPerfil,
        'modelUser' => $modelUser,
        'modelAdesao' => $modelAdesao,
    ]) ?>

</div>
