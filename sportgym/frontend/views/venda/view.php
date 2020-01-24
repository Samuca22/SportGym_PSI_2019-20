<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Venda */

$this->title = 'Detalhes Compra';

?>
<div class="venda-view">

    <h3 class="text-center"><?= Html::encode($this->title) ?></h3>
    <hr>
    <br>

    <h4 style="color:#b9b9b9">Seus Dados</h4>
    <div class="venda-caixa-comprador">
        Sócio nº: <?= $model->iDperfil->nSocio ?><br>
        Nome: <?= $model->iDperfil->primeiroNome . ' ' . $model->iDperfil->apelido ?><br>
        Email: <?= $user->email ?><br>
        Telefone: <?= $model->iDperfil->telefone ?><br>
        Contribuinte: <?= $model->iDperfil->nif ?>
    </div>

    <br>
    <br>
    <h4 style="color:#b9b9b9">Lista de produtos comprados</h4>

    <table class="table table-bordered">
        <tr style="background: #3D77DF;">
            <th>Produto</th>
            <th class="text-center">Quantidade</th>
            <th class="text-center">Valor</th>
        </tr>
        <?php foreach ($linhasVenda as $linhaVenda) : ?>
            <tr>
                <td>
                    <?php if ($linhaVenda->iDproduto->fotoProduto == null) : ?>
                        <img src="<?= $linhaVenda->iDproduto->semImagem() ?>" height="25" width="25" style="margin-right:7px;"><?= $linhaVenda->iDproduto->nome ?>
                    <?php else : ?>
                        <img src="data:image/png;base64,<?= base64_encode($linhaVenda->iDproduto->fotoProduto) ?>" height="25" width="25" style="margin-right:7px;"><?= $linhaVenda->iDproduto->nome ?>
                    <?php endif; ?>
                </td>
                <td class="text-center" style="font-size:16px;"><?= 'x' . $linhaVenda->quantidade ?></td>
                <td class="text-center" style="font-size:16px;"><?= $linhaVenda->subTotal . '€' ?></td>
            </tr>

        <?php endforeach; ?>
    </table>
    <div class="carrinho-total">
        <span>Valor Total</span><br>
        <span class="carrinho-valor-total"><?= $model->total . '€' ?></span>
    </div>

</div>