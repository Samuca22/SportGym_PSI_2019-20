<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */

$this->title = 'Editar Sócio';
?>
<div class="perfil-update">

    <h4>Editar Dados Pessoais</h4>         
    <hr class="hr">
    <br>

    <?= $this->render('_form-update', [
        'perfil' => $perfil,
        'user' => $user,
    ]) ?>

</div>