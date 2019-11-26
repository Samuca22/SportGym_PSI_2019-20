<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PlanoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Planos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plano-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Plano', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDplano',
            'nome',
            'nutricao',
            'treino',
            'descricao',
            //'IDperfil',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
