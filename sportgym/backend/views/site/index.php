<?php

/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\helpers\Html;

?>

<h1><?= Html::encode($this->title) ?></h1>
<h4>
    Bem vindo <?= Html::encode($nomeApresentacao->primeiroNome). ' '. Html::encode($nomeApresentacao->apelido). '.' ?>
</h4>

<h3>ULTIMAS VENDAS</h3>
<?= GridView::widget([
    'dataProvider' => $venda_dataProvider,
    'columns' => [
        'estado',
        'dataVenda',
        'total',
        [
            'attribute' => 'Nome',
            'value' => 'iDperfil.primeiroNome',
        ],
        [
            'attribute' => 'Apelido',
            'value' => 'iDperfil.apelido',
        ],
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);
?>
<br>
<h3>GINASIOS</h3>
<?= GridView::widget([
    'dataProvider' => $ginasio_dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],


        'localidade',
        'telefone',
        'email:email',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>









