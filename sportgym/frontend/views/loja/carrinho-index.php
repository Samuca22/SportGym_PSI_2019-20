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


    <div class="row">
            <div class="col-md-3" style="text-align:center;margin-bottom:16px;">
                <div style="border:1px solid white;color:black;background:#f6f6f6;border-radius:6px;padding:8px;">
                    <p><?= $venda->estado ?></p>
                </div>
            </div>
    </div>

    <?php if($linhaVendas != null): ?>
    <?php foreach($linhaVendas as $linha): ?>
        <p><?=  $linha->IDproduto ?></p>
        <p><?= $linha->IDvenda ?></p>
        <p><?= 'x' . $linha->quantidade ?></p>
        <p><?= $linha->subTotal . '€'  ?></p>
        <hr>
    <?php endforeach; ?>
    <?php endif; ?>


</div>