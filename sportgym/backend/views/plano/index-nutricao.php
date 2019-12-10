<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PlanoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Planos Nutrição';
?>
<div class="plano-index">

    <h1>Planos de Nutrição <?= Html::a('Criar Novo Plano', ['create'], ['class' => 'btn btn-lg btn-criarPlano']) ?></h1>
    <hr>
    <br>

    <?php echo $this->render('_search-nutricao', ['model' => $nutricao_searchModel]);
    ?>

    <div style="overflow-y: scroll; Height: 400px; border: 1px solid #595959;">
        <table class="table table-bordered">
            <tr style="background: #3D77DF;">
                <th style="width: 25%;">Nome</th>
                <th>Descrição</th>
                <th style="width: 25%;text-align:center;">Ação</th>
            </tr>
            <?php foreach ($nutricao_dataProvider->models as $model) : ?>
                <tr style="overflow:hidden;text-overflow:ellipsis;">
                    <td><?= $model->nome ?></td>
                    <td style="max-width:500px;max-height:40px;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;">
                        <?= $model->descricao ?>
                    </td>
                    <td class="td-acao">
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