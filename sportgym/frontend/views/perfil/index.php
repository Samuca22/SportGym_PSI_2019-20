<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
<<<<<<< HEAD
/* @var $searchModel common\models\PerfilSearch */
=======
>>>>>>> Ricardo_API
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfils';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Perfil', ['create'], ['class' => 'btn btn-success']) ?>
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

            'IDperfil',
            'nSocio',
            'foto',
            'primeiroNome',
            'apelido',
            //'genero',
            //'telefone',
            //'dtaNascimento',
            //'rua',
            //'localidade',
            //'cp',
            //'nif',
            //'peso',
            //'altura',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
