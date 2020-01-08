<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */

$this->title = $modelPerfil->primeiroNome . ' ' . $modelPerfil->apelido;
?>

<div class="img-container">
    <div class="my-container definicoes">
        <div class="row">
            <div class="col-xs-8">
                <h4>Alterar Dados Pessoais</h4>
            </div>
            <div class="col-xs-4">
                <p style="float: right;">
                    <?= Html::a('Voltar', ['/definicoes/index'], ['class' => 'btn btn-azul']) ?>
                </p>
            </div>
        </div>
        <hr class="hr">
        <br>

        <div class="perfil-update">

            <?= $this->render('_form', [
                'modelPerfil' => $modelPerfil,
                'modelUser' => $modelUser,
                'user' => $user,
            ]) ?>

        </div>
    </div>

</div>