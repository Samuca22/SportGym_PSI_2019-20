<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PerfilAulaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfil Aulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-aula-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Perfil Aula', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDperfil',
            'IDaula',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
