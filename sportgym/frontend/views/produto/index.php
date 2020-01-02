<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
<<<<<<< HEAD
/* @var $searchModel common\models\ProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Produto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDproduto',
            'nome',
            'fotoProduto',
            'descricao',
            'estado',
            //'precoProduto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
=======
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="produto-index">
    <div class="row">
        <div class="col-xs-6">
            <h3>Loja</h3>
        </div>
        <div class="col-xs-6">
            <span style="float:right;margin-top:15px;font-size:24px;"><img src="/imgs/compras_carro.png" width="30" height="30" style="margin-right: 8px;">(0)</span>
        </div>
    </div>
    <hr class="hr">
    <br>


            <?php echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="row">
        <?php foreach ($produto_dataProvider->models as $produto) : ?>
            <div class="col-md-3" style="text-align:center;margin-bottom:16px;">
                <?= Html::a('<img src=' . $produto->mostrarImagem() . ' width="170" height="170">', ['view', 'id' => $produto->IDproduto], ['class' => 'img-produto']) ?>
                <div style="border:1px solid white;color:black;background:#f6f6f6;border-radius:6px;padding:8px;">
                    <p><?= $produto->nome ?></p>
                    <span style="font-weight:bold;font-size:22px;"><?= $produto->precoProduto . '€' ?></span><br>
                    <?php if ($produto->estado == 1) : ?>
                        <span style="font-weight:bold;color: green;">Disponível</span><br>
                    <?php else : ?>
                        <span style="font-weight:bold;color: red;">Não Disponível</span><br>
                    <?php endif; ?>
                    <?= Html::a('ADICIONAR AO CARRINHO<img src="/imgs/compras_carro.png" width="18" height="18" class="img-carro">', ['view'], ['class' => 'btn btn-adicionar-carrinho']) ?>
                </div>
            </div>
        <?php endforeach; ?>

    </div>


</div>
>>>>>>> Ricardo_API
