<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View /
/ @var $searchModel common\models\VendaSearch /
/ @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendas';
?>
<div class="venda-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <br>

    <?php echo $this->render('_search', ['model' => $vendas_searchModel]);
    ?>

    <table class="table table-bordered" style="text-align:center;">
        <tr style="background: #3D77DF;">
            <th style="text-align:center;">Comprador</th>
            <th style="text-align:center;">Venda</th>
            <th style="text-align:center;">Ação</th>
        </tr>
        <?php foreach ($vendas_dataProvider->models as $model) : ?>
            <tr>
                <td>
                    <p><?= $model->iDperfil->primeiroNome . ' ' . $model->iDperfil->apelido ?></p>
                    <p><?= $model->iDperfil->telefone ?></p>
                </td>
                <td>
                    <p><?= $model->dataVenda ?></p>
                    <p><?= $model->total . '€' ?></p>
                </td>
                <td class="td-acao">
                    <?= Html::a('Ver Detalhes', ['view', 'id' => $model->IDvenda], ['class' => 'btn btn-ver-venda']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>