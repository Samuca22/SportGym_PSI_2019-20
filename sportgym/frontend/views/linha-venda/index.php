<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
<<<<<<< HEAD
/* @var $searchModel common\models\LinhaVendaSearch */
=======
>>>>>>> Ricardo_API
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Linha Vendas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linha-venda-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Linha Venda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<<<<<<< HEAD
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
=======

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
>>>>>>> Ricardo_API
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
