<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */

$this->title = 'Editar ' . $model->primeiroNome . ' ' . $model->apelido;
?>
<div class="row" style="align-items: center; display: flex;">
    <div class="col-md-8">
        <h1>Definições</h1>
    </div>
    <div class="col-md-4">
        <span style="float: right;">
            <?= Html::a('Home', ['/perfil/view'], ['class' => 'btn btn-azulFront']) ?>
        </span>
    </div>
</div>
<hr>
<br>

<div class="perfil-update">

    <?= $this->render('_form', [
        'model' => $model,
        'modelUser' => $modelUser,
        'user' => $user,
    ]) ?>

</div>
