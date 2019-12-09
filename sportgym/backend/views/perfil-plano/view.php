<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilPlano */


\yii\web\YiiAsset::register($this);
?>

<div class="perfil-plano-view">

    <h1>Dados da Atribuição do Plano</h1>
    <hr>
    <br>
    

    <table class="table table-bordered">
        <tr>
            <th>Número de Sócio</th>
            <td><?= $model->iDperfil->nSocio ?></td>
        </tr>
        <tr>
            <th>Nome do Sócio</th>
            <td><?= $model->iDperfil->primeiroNome . ' ' . $model->iDperfil->apelido ?></td>
        </tr>
        <tr>
            <th>Nome do Plano</th>
            <td><?= $model->iDplano->nome ?></td>
        </tr>
        <tr>
            <th>Data de Atribuição</th>
            <td><?= $model->dtaplano ?></td>
        </tr>
    </table>

</div>