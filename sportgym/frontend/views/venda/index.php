<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Minhas Compras';
?>


<div class="venda-index">
    <div class="img-container">
        <div class="my-container minhas-compras">
            <h3>
                <center><?= Html::encode($this->title) ?></center>
            </h3>
            <hr class="hr">
            <br>

            <div class="row">

            <div class="col-xs-6 minhas-compras-caixa-pesquisa">
            <?php echo $this->render('_search', ['model' => $searchModel]);
            ?>
            </div>
        </div>
            

            <div class="tabela">
                <div class="panel">
                    <table class="table text-center">
                        <tr style="background: #3D77DF;">
                            <th class="text-center">Nº Encomenda</th>
                            <th class="text-center">Data</th>
                            <th class="text-center">Total</th>
                        </tr>
                        <?php foreach ($dataProvider->models as $model) : ?>
                            <tr>
                                <td><?= '#' . $model->numVenda ?></td>
                                <td><?= Yii::$app->formatter->asDate($model->dataVenda, 'dd-MM-yyyy') ?></td>
                                <td><?= $model->total . '€' ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>