<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loja - SportGym';
?>
<div class="produto-index">
    <div class="row">
        <div class="col-xs-6">
            <h3>Loja</h3>
        </div>
        <div class="col-xs-6">
            <?php if ($venda != null) : ?>
                <?= Html::a('<span style="float:right;margin-top:15px;font-size:24px;"><img src="/imgs/compras_carro.png" width="30" height="30" style="margin-right: 8px;">(' . number_format($venda->total, 2) . '€)</span>', ['carrinho'], ['style' => 'color: #ffffff;']) ?>
            <?php else : ?>
                <span style="float:right;margin-top:15px;font-size:24px;"><img src="/imgs/compras_carro.png" width="30" height="30" style="margin-right: 8px;">(0€)</span>
            <?php endif; ?>
        </div>
    </div>
    <hr class="hr">
    <br>


    <?php echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="row">
        <?php foreach ($produto_dataProvider->models as $produto) : ?>
            <div class="col-md-3" style="text-align:center;margin-bottom:16px;">
                <?= Html::a('<img src=' . $produto->mostrarImagem() . ' width="170" height="170">', ['ver-produto', 'IDproduto' => $produto->IDproduto], ['class' => 'img-produto']) ?>
                <div style="border:1px solid white;color:black;background:#f6f6f6;border-radius:6px;padding:8px;">
                    <p><?= $produto->nome ?></p>
                    <span style="font-weight:bold;font-size:22px;"><?= $produto->precoProduto . '€' ?></span><br>
                    <?= Html::a('ADICIONAR AO CARRINHO<img src="/imgs/compras_carro.png" width="18" height="18" class="img-carro">', ['loja/adicionar-carrinho', 'IDproduto' => $produto->IDproduto], ['class' => 'btn btn-adicionar-carrinho']) ?>
                </div>
            </div>
        <?php endforeach; ?>

    </div>


</div>