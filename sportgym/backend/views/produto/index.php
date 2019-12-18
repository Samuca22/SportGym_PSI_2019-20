<?php

use Codeception\PHPUnit\ResultPrinter\HTML as ResultPrinterHTML;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestão de Produtos';;
?>
<div class="produto-index">

    <h3>Gestão de Produtos <?= Html::a('Criar Produto', ['create'], ['class' => 'btn btn-lg btn-azul btn-criar-plano']) ?></h3>
    <hr class="hr">
    <br>


    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="caixa-tabela">
        <div class="panel">
            <table class="table table-bordered">
                <tr style="background: #3D77DF;">
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th class="text-center">Preço</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Ação</th>
                </tr>
                <?php foreach ($dataProvider->models as $model) : ?>
                    <tr>
                        <td><img src='<?= $model->mostrarImagem() ?>' width='25' height='25' style="margin-right:7px;"><?= $model->nome ?></td>
                        <td style="max-width:200px;text-overflow:ellipsis;overflow:hidden;">
                            <?= $model->descricao ?>
                        </td>
                        <td class="text-center"><?= $model->precoProduto . '€' ?></td>
                        <td class="text-center">
                            <?php if ($model->estado == 0) { ?>
                                <?= Html::a('Ativar', ['alterar-estado', 'id' => $model->IDproduto], ['class' => 'btn btn-acao']) ?>
                            <?php } ?>
                            <?php if ($model->estado == 1) { ?>
                                <?= Html::a('Desativar', ['alterar-estado', 'id' => $model->IDproduto], ['class' => 'btn btn-acao']) ?>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <?= Html::a('Ver', ['view', 'id' => $model->IDproduto], ['class' => 'btn btn-xs btn-acao']) ?>
                            <?= Html::a('Editar', ['update', 'id' => $model->IDproduto], ['class' => 'btn btn-xs btn-acao']) ?>
                            <?= Html::a('Eliminar', ['delete', 'id' => $model->IDproduto], [
                                    'class' => 'btn btn-xs btn-acao',
                                    'data-confirm' => 'Tem mesmo a certeza que pretende apagar este plano?', 'data-method' => 'post'
                                ]) ?>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>