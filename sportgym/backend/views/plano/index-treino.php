<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PlanoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Planos Treino';
?>
<div class="plano-index">

    <h3>Planos de Treino <?= Html::a('Criar Novo Plano', ['create'], ['class' => 'btn btn-lg btn-azul btn-criar-plano']) ?></h3>
    <hr class="hr">
    <br>

    <?php echo $this->render('_search-treino', ['model' => $treino_searchModel]);
    ?>

    <div class="caixa-tabela" style="max-height: 600px;">
        <div class="panel">
            <table class="table table-bordered">
                <tr style="background: #3D77DF;">
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th class="text-center">Ação</th>
                </tr>
                <?php foreach ($treino_dataProvider->models as $model) : ?>
                    <tr>
                        <td><?= $model->nome ?></td>
                        <td class="td-descricao">
                            <?= $model->descricao ?>
                        </td>
                        <td class="text-center">
                            <?= Html::a('Ver', ['view', 'id' => $model->IDplano], ['class' => 'btn btn-xs btn-acao']) ?>
                            <?= Html::a('Editar', ['update', 'id' => $model->IDplano], ['class' => 'btn btn-xs btn-acao']) ?>
                            <?= Html::a('Eliminar', ['delete', 'id' => $model->IDplano], [
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