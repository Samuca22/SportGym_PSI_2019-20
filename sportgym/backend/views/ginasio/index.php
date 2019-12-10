<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GinasioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ginasios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ginasio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ginasio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $ginasio_searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDginasio',
            'rua',
            'localidade',
            'cp',
            'telefone',
            //'email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
