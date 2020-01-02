<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
<<<<<<< HEAD
/* @var $searchModel common\models\VendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Minhas Compras';
?>
<div class="venda-index">

    <h3><center><?= Html::encode($this->title) ?></center></h3>
    <hr class="hr">
    <br>

    <?php echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <div class="tabela">
        <div class="panel">
            <table class="table table-bordered" style="text-align:center;">
                <tr style="background: #3D77DF;">
                    <th class="text-center">Encomenda #</th>
                    <th class="text-center">Data</th>
                    <th class="text-center">Total</th>
                </tr>
                <?php foreach ($dataProvider->models as $model) : ?>
                    <tr>
                        <td>NºA TUA MAE</td>
                        <td><?= Yii::$app->formatter->asDate($model->dataVenda, 'dd-MM-yyyy') ?></td>
                        <td><?= $model->total . '€' ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>


=======
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venda-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Venda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDvenda',
            'estado',
            'dataVenda',
            'total',
            'IDperfil',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
>>>>>>> Ricardo_API
