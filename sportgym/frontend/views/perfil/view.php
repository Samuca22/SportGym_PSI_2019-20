<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */

$this->title = $modelPerfil->primeiroNome . ' ' . $modelPerfil->apelido . ' ' . $modelPerfil->nSocio;
?>
<div class="row" style="align-items: center; display: flex;">
    <div class="col-md-8">
        <h1>Bem-Vindo <?= $modelPerfil->primeiroNome, ' ', $modelPerfil->apelido ?></h1>
    </div>
    <div class="col-md-4">
        <span style="float: right;">
            <?= Html::a('Definições', ['/definicoes/index'], ['class' => 'btn btn-azulFront']) ?>
        </span>
    </div>
</div>
<hr>
<div class="perfil-container container">
    <div class="row" style="margin-top: 30px">
        <div class="col-md-3">
            <img src="<?= $modelPerfil->foto ?>" width="200" height="200"> <!-- Não mostra a foto porque não dá para ir buscá-la ao backend -->
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col col-sm-12">
                    <span>Nome: </span><?= $modelPerfil->primeiroNome ?> <?= $modelPerfil->apelido ?>
                </div>
            </div>
            <div class="row" style="margin-top: 20px">
                <div class="col col-md-12">
                    <span>Nº Sócio:</span> <?= $modelPerfil->nSocio ?> <span>Username:</span> <?= $modelUser->username ?>
                </div>
            </div>
            <div class="row" style="margin-top: 20px">
                <div class="col col-sm-12">
                    <span>Género:</span> <?= $modelPerfil->genero ?> <span>Data de Nascimento:</span> <?= Yii::$app->formatter->asDate($modelPerfil->dtaNascimento, 'dd/MM/yyyy') ?>
                </div>
            </div>
            <div class="row" style="margin-top: 20px">
                <div class="col col-sm-12">
                    <span>Peso:</span> <?= $modelPerfil->peso ?>kg <span>Altura:</span> <?= $modelPerfil->altura ?>cm
                </div>
            </div>
        </div>
    </div>
</div>
<div class="vendas-container">
    <h1>Últimas Vendas</h1>
    <hr>
</div>
<div class="table-container container" style="margin-top: 50px">
    <div class="panel">
        <table class="table table-bordered" style="text-align: center">
            <tr style="background: #3D77DF;">
                <th class="text-center">Data</th>
                <th class="text-center">Total</th>
                <th class="text-center">Estado</th>
            </tr>
                                                <!--Não tou a conseguir motrar as vendas-->
            <!--
             foreach ($modelVenda->models as $model) ?>
            <tr>
                <td>
                    <p> $model->dataVenda ?></p>
                </td>
                <td>
                    <p> Yii::$app->formatter->asDate($model->dataVenda, 'dd/MM/yyyy') ?></p>
                </td>
                <td>
                    <p> $model->total . '€' ?></p>
                </td>
                <td>
                     if ($model->estado == 1) : ?>
                        <span>Ativada</span>
                     else : ?>
                        <span>Desativada</span>
                     endif ?>
                </td>
            </tr>
                    -->
        </table>
    </div>
</div>