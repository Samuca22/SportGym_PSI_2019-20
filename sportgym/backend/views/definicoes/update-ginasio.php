<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */

$this->title = 'Editar Sócio';
?>
<div class="perfil-update">

    <h4>Atualizar Dados Ginásio - <?= $ginasio->localidade ?></h4>         
    <hr class="hr">
    <br>

    <?= $this->render('_form-ginasio', [
        'ginasio' => $ginasio,
    ]) ?>

</div>