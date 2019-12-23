<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
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


