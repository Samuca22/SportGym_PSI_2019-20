<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Venda */

$this->title = 'Detalhes Venda';
\yii\web\YiiAsset::register($this);
?>
<div class="venda-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <br>

    <h4 style="color:#b9b9b9">Comprador</h4>
    <div class="venda-caixa-comprador">
        <p>Nome: <?= $model->iDperfil->primeiroNome . ' ' . $model->iDperfil->apelido ?></p>
        <p>Email: <?= $comprador->email ?></p>
        <p>Telefone: <?= $model->iDperfil->telefone ?></p>
    </div>

    <br>
    <br>
    <h4 style="color:#b9b9b9">Linhas de Venda</h4>

    <table class="table table-bordered">
                <tr style="background: #3D77DF;">
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                </tr>
                <?php foreach ($linhasVenda as $linhaVenda) : ?>
                    <tr>
                        <td><?= $linhaVenda->produtos->nome ?></td>
                        <td><?= $linhaVenda->quantidade ?></td>
                        <td><?= $linhaVenda->subTotal . '€' ?></td>
                    </tr>

                <?php endforeach; ?>
            </table>
</div>