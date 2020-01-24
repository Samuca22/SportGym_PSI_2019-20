<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Minhas Compras';
?>


<div class="venda-index">
    <h3 class="text-center"><?= Html::encode($this->title) ?></h3>
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
            <table class="table">
                <tr style="background: #3D77DF;">
                    <th>Nº Encomenda</th>
                    <th class="text-center">Data</th>
                    <th class="text-center">Total</th>
                </tr>
                <?php foreach ($dataProvider->models as $model) : ?>
                    <tr>
                        <td>
                            <?= '#' . $model->numVenda ?>
                            <?= Html::a('Ver detalhes', ['view', 'id' => $model->IDvenda], ['class' => 'btn btn-venda-ver-detalhes']) ?>
                        </td>
                        <td class="text-center"><?= Yii::$app->formatter->asDate($model->dataVenda, 'dd-MM-yyyy') ?></td>
                        <td class="text-center"><?= $model->total . '€' ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>