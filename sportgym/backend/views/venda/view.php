<?php

use yii\helpers\Html;

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
        Sócio nº: <?= $model->iDperfil->nSocio ?><br>
        Nome: <?= $model->iDperfil->primeiroNome . ' ' . $model->iDperfil->apelido ?><br>
        Email: <?= $comprador->email ?><br>
        Telefone: <?= $model->iDperfil->telefone ?><br>
        Contribuinte: <?= $model->iDperfil->nif ?>
    </div>

    <br>
    <br>
    <h4 style="color:#b9b9b9">Lista de produtos vendidos</h4>

    <table class="table table-bordered">
        <tr style="background: #3D77DF;">
            <th>Produto</th>
            <th style="text-align:center;">Quantidade</th>
            <th style="text-align:center;">Valor</th>
        </tr>
        <?php foreach ($linhasVenda as $linhaVenda) : ?>
            <tr>
                <td>
                    <?php if ($linhaVenda->iDproduto->fotoProduto == null) : ?>
                        <img src="<?= $linhaVenda->iDproduto->semImagem() ?>" height="25" width="25" style="margin-right:7px;"><?= $linhaVenda->iDproduto->nome ?>
                    <?php else : ?>
                        <img src="data:image/png;base64,<?= base64_encode($linhaVenda->iDproduto->fotoProduto) ?>" height="25" width="25" style="margin-right:7px;"><?= $linhaVenda->iDproduto->nome ?>
                    <?php endif; ?>
                    <?= Html::a('Ver produto', ['produto/view', 'id' => $linhaVenda->iDproduto->IDproduto], ['class' => 'btn btn-venda-ver-produto']) ?>
                </td>
                <td style="text-align:center;font-size:16px;"><?= 'x' . $linhaVenda->quantidade ?></td>
                <td style="text-align:center;font-size:16px;"><?= $linhaVenda->subTotal . '€' ?></td>
            </tr>

        <?php endforeach; ?>
    </table>

</div>