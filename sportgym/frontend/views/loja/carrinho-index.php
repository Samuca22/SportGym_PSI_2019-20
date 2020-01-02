<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="produto-index">
    <h3>Carrinho</h3>
    <hr class="hr">
    <br>

    <table class="table">
        <?php if ($linhaVendas != null) : ?>
            <?php foreach ($linhaVendas as $linha) : ?>
                <tr>
                    <td style="vertical-align: middle;"><img src="<?= $linha->iDproduto->mostrarImagem() ?>" height="90" width="90"></td>
                    <td style="vertical-align: middle;"><span><?= $linha->iDproduto->nome . ' - ' . $linha->iDproduto->precoProduto . '€' ?></span></td>
                    <td style="vertical-align: middle;"><span style="font-size:20px;"><?= Html::a('<img src="/imgs/QuantMenos.png" width="20" height="20" style="margin-right:10px;">', ['menos-quantidade', 'IDlinhaVenda' => $linha->IDlinhaVenda]) . 'x'
                                                                                            . $linha->quantidade .
                                                                                            Html::a('<img src="/imgs/QuantMais.png" width="20" height="20" style="margin-left:10px;">', ['mais-quantidade', 'IDlinhaVenda' => $linha->IDlinhaVenda]) ?></span></td>
                    <td style="vertical-align: middle;"><span style="float:right;padding-right:16px;"><?= $linha->subTotal . '€'  ?></span></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>

    <div class="row">
        <div class="col-md-6">
            <?= Html::a('Finalizar Compra', ['finalizar-venda'], ['class' => 'btn btn-lg', 'style' => 'color:white;background:#28d133;border:1px solid #fff']) ?>
            <?= Html::a('Remover Items', ['apagar-venda'], [
                'class' => 'btn btn-lg btn-vermelho', 'style' => 'border:1px solid #fff',
                'data' => [
                    'confirm' => 'De certeza que pretende apagar todos os produtos do seu carrinho?',
                ],
            ]) ?>
        </div>
        <div class="col-md-6">
            <div style="float:right;padding-right:16px;">
                <span>Valor Total</span><br>
                <span style="font-size: 18px;float:right;"><?= $venda->total . '€' ?></span>
            </div>
        </div>
    </div>


</div>