<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adesaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adesao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Adesao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDadesao',
            'dtaInicio',
            'dtaFim',
            'IDginasio',
            'IDperfil',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
