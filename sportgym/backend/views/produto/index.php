<?php

use Codeception\PHPUnit\ResultPrinter\HTML as ResultPrinterHTML;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Produto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <table class="table table-bordered">
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Estado</th>
            <th>Ação</th>
        </tr>
        <?php foreach($dataProvider->models as $model):?>
            <tr>
                <td><?= $model->nome ?></td>
                <td><?= $model->descricao ?></td>
                <td><?= $model->precoProduto . '€' ?></td>
                <td>
                    <?php if($model->estado == 0){?>
                        Não Ativo
                    <?php } ?>
                    <?php if($model->estado == 1){?>
                        Ativo
                    <?php } ?>
                </td>
                <td>
                    <?=Html::a('Ver', ['view', 'id'=>$model->IDproduto], ['class' => 'btn btn-xs '])?>
                    <?=Html::a('Editar', ['update', 'id'=>$model->IDproduto], ['class' => 'btn btn-xs '])?>
                    <?=Html::a('Eliminar', ['delete', 'id'=>$model->IDproduto], ['class' => 'btn btn-xs ',
                    'data-confirm' => 'Tem mesmo a certeza que pretende apagar este produto?', 'data-method' => 'post'
                    ])?>
                </td>
            </tr>
        <?php endforeach;?>
    </table>

</div>
