<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Produto */

$this->title = $model->IDproduto;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IDproduto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IDproduto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que quer eliminar?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <table class="table table-bordered">
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Estado</th>
            <th>Foto do Produto</th>
        </tr>
            <tr>
                <td><?= $model->nome ?></td>
                <td><?= $model->descricao ?></td>
                <td><?= $model->precoProduto  .'€' ?></td>
                <td>
                    <?php if($model->estado == 0){?>
                        Não Ativo
                    <?php } ?>
                    <?php if($model->estado == 1){?>
                        Ativo
                    <?php } ?>
                </td>
                <td>
                    <img src='<?=$model->mostrarImagem()?>' width='100' height='100'>
                    <?php //"<img src='/uploads/produtos/{$model->fotoProduto}' width='100' height='100' "?>
                </td>
            </tr>
    </table>
</div>
