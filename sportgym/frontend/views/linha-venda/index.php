<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Linha Vendas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linha-venda-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Linha Venda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDlinhaVenda',
            'quantidade',
            'subTotal',
            'IDvenda',
            'IDproduto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
