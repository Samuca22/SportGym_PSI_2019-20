<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ginasio Aulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ginasio-aula-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ginasio Aula', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDginasio',
            'IDaula',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
