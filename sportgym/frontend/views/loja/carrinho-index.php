<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="produto-index">

    <h3 class="text-center">Carrinho</h3>
    <hr class="hr">
    <br>

    <div class="carrinho-container">
        <table class="table">
            <?php if ($linhaVendas != null) : ?>
                <?php foreach ($linhaVendas as $linha) : ?>
                    <tr>
                        <td class="vertical-middle">
                            <?php if ($linha->iDproduto->fotoProduto == null) : ?>
                                <img src="<?= $linha->iDproduto->semImagem() ?>" height="90" width="90">
                            <?php else : ?>
                                <img src="data:image/png;base64,<?= base64_encode($linha->iDproduto->fotoProduto) ?>" height="90" width="90">
                            <?php endif; ?>
                        </td>
                        <td class="vertical-middle">
                            <span>
                                <?= $linha->iDproduto->nome . ' - ' . $linha->iDproduto->precoProduto . '€' ?>
                            </span>
                        </td>
                        <td class="vertical-middle">
                            <span style="font-size:20px;"><?= Html::a('<img src="/imgs/QuantMenos.png" width="20" height="20">', ['menos-quantidade', 'IDlinhaVenda' => $linha->IDlinhaVenda], ['class' => 'carrinho-mais']) . 'x'
                                                                . $linha->quantidade .
                                                                Html::a('<img src="/imgs/QuantMais.png" width="20" height="20">', ['mais-quantidade', 'IDlinhaVenda' => $linha->IDlinhaVenda], ['class' => 'carrinho-menos']) ?></span></td>
                        <td class="vertical-middle">
                            <span class="carrinho-subtotal"><?= $linha->subTotal . '€'  ?></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>

        <div class="row">
            <div class="col-md-6">
                <?= Html::a('Finalizar Compra', ['finalizar-venda', 'id' => $venda->IDvenda], [
                    'class' => 'btn btn-lg btn-finalizar-venda',
                    'data' => [
                        'confirm' => 'De certeza que pretende eftuar esta compra?',
                    ],
                    ]) ?>
                <?= Html::a('Remover Items', ['apagar-venda'], [
                    'class' => 'btn btn-lg btn-vermelho btn-remover-produtos',
                    'data' => [
                        'confirm' => 'De certeza que pretende apagar todos os produtos do seu carrinho?',
                    ],
                ]) ?>
            </div>
            <div class="col-md-6">
                <div class="carrinho-total">
                    <span>Valor Total</span><br>
                    <span class="carrinho-valor-total"><?= $venda->total . '€' ?></span>
                </div>
            </div>
        </div>
    </div>
</div>