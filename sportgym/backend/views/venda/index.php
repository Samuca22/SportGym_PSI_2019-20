<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View /
/ @var $searchModel common\models\VendaSearch /
/ @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendas';
?>
<div class="venda-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <hr class="hr">
    <br>

    <?php echo $this->render('_search', ['model' => $vendas_searchModel]);
    ?>

    <div class="caixa-tabela">
        <div class="panel">
            <table class="table table-bordered" style="text-align:center;">
                <tr style="background: #3D77DF;">
                    <th class="text-center">Comprador</th>
                    <th class="text-center">Venda</th>
                    <th class="text-center">Ação</th>
                </tr>
                <?php foreach ($vendas_dataProvider->models as $model) : ?>
                    <tr>
                        <td>
                            <p><?= $model->iDperfil->primeiroNome . ' ' . $model->iDperfil->apelido ?></p>
                            <p><?= $model->iDperfil->telefone ?></p>
                        </td>
                        <td>
                            <p><?= Yii::$app->formatter->asDate($model->dataVenda, 'dd-MM-yyyy') ?></p>
                            <p><?= $model->total . '€' ?></p>
                        </td>
                        <td class="text-center"style="vertical-align:middle;">
                            <?= Html::a('Ver Detalhes', ['view', 'id' => $model->IDvenda], ['class' => 'btn btn-azul']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>