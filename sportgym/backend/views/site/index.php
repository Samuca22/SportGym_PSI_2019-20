<?php

/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\helpers\Html;

?>

<h1><?= Html::encode($this->title) ?></h1>
<h3>Bem vindo Sr.(a) <?= Html::encode($perfilLogado->primeiroNome) . ' ' . Html::encode($perfilLogado->apelido) . '.' ?></h3>
<hr class="hr">
<br>

<h4>Últimas Vendas</h4>

<div class="caixa-tabela">
    <div class="panel">
        <table class="table table-bordered">
            <tr style="background: #3D77DF;">
                <th>Nome Comprador</th>
                <th>Valor</th>
                <th>Data</th>
            </tr>
            <?php foreach ($venda_dataProvider->models as $model) : ?>
                <tr>
                    <td><?= $model->iDperfil->primeiroNome . ' ' . $model->iDperfil->apelido ?></td>
                    <td><?= $model->total . '€' ?></td>
                    <td><?= $model->dataVenda ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>


<br>
<br>
<div id="home-seccao-ginasios">
    <h4>Ginásios</h4>
    <?php foreach ($ginasio_dataProvider->models as $model) : ?>
        <?= Html::a("{$model->localidade}", ['definicoes/index-ginasios'], ['class' => 'btn btn-lg btn-azul btn-home-ginasios']) ?>
    <?php endforeach; ?>
</div>