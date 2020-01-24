<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loja - SportGym';
?>
<h3 class="text-center">Loja</h3>
<hr class="hr">
<br>

<div class="row">
    <div class="col-sm-8 carrinho-img">
        <?php if ($venda != null) : ?>
            <?= Html::a('<span class="carrinho-valor"><img src="/imgs/compras_carro.png" width="30" height="30" style="margin-right: 8px;">(' . number_format($venda->total, 2) . '€)</span>', ['carrinho'], ['style' => 'color: #ffffff;']) ?>
        <?php else : ?>
            <?= Html::a('<span class="carrinho-valor"><img src="/imgs/compras_carro.png" width="30" height="30" style="margin-right: 8px;">(' . 0 . '€)</span>', ['carrinho'], ['style' => 'color: #ffffff;']) ?>
        <?php endif; ?>
    </div>

    <div class="col-sm-4">
        <?php echo $this->render('_search', ['model' => $produto_searchModel]);
        ?>
    </div>
</div>

<div class="row">
    <?php foreach ($produto_dataProvider->models as $produto) : ?>
        <div class="col-lg-3 text-center" style="margin:20px 0;">
            <?php if ($produto->fotoProduto == null) : ?>
                <?= Html::a('<img src="' . $produto->semImagem() . '" height="170" width="170">', ['ver-produto', 'IDproduto' => $produto->IDproduto], ['class' => 'img-produto']) ?>
                <div class="loja-caixa-nome-preco">
                    <p><?= $produto->nome ?></p>
                    <span class="preco-produto"><?= $produto->precoProduto . '€' ?></span><br>
                    <?= Html::a('ADICIONAR AO CARRINHO<img src="/imgs/compras_carro.png" width="18" height="18" class="img-carro">', ['loja/adicionar-carrinho', 'IDproduto' => $produto->IDproduto], ['class' => 'btn btn-adicionar-carrinho']) ?>
                </div>
            <?php else : ?>
                <?= Html::a('<img src="data:image/png;base64,' . base64_encode($produto->fotoProduto) . '" height="170" width="170">', ['ver-produto', 'IDproduto' => $produto->IDproduto], ['class' => 'img-produto']) ?>
                <div class="loja-caixa-nome-preco">
                    <p><?= $produto->nome ?></p>
                    <span class="preco-produto"><?= $produto->precoProduto . '€' ?></span><br>
                    <?= Html::a('ADICIONAR AO CARRINHO<img src="/imgs/compras_carro.png" width="18" height="18" class="img-carro">', ['loja/adicionar-carrinho', 'IDproduto' => $produto->IDproduto], ['class' => 'btn btn-adicionar-carrinho']) ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>