<?php

/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\helpers\Html;

?>

    <p>
        <?= Html::a('Dados Pessoais', ['index-utilizador'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Ginásios', ['index-ginasio'], ['class' => 'btn btn-success']) ?>
    </p>
    <hr>

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>Lista de Ginásios </h3>

<?php echo $this->render('_search-ginasio', ['model' => $ginasio_searchModel]); ?>

<?= GridView::widget([
    'dataProvider' => $ginasio_dataProvider,
    //'filterModel' => $ginasio_searchModel,
    'columns' => [


        'localidade',
        'rua',
        'cp',
        'email:email',
        'telefone',


        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>