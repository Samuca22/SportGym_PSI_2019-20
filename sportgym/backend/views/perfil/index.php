<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestão de Perfis';
?>
<div class="perfil-index">

    <h3>Gestão de Perfis<?= Html::a('Criar Perfil', ['create'], ['class' => 'btn btn-lg btn-azul btn-criar-plano']) ?></h3>
    <hr class="hr">
    <br>



    <?php echo $this->render('_search', ['model' => $perfis_searchModel]);
    ?>

    <div class="caixa-tabela">
        <div class="panel">
            <table class="table table-bordered">
                <tr style="background: #3D77DF;">
                    <th>Número de Sócio</th>
                    <th>Nome de Sócio</th>
                    <th>Nº Contribuinte</th>
                    <th class="text-center">Ação</th>
                </tr>
                <?php foreach ($perfis_dataProvider->models as $model) : ?>
                    <tr>
                        <td>
                            <img src="data:image/png;base64,<?= base64_encode($model->foto) ?>" height="25" width="25" style="margin-right:7px;"><?= $model->nSocio ?>
                        </td>
                        <td><?= $model->primeiroNome . ' ' . $model->apelido ?></td>
                        <td><?= $model->nif ?></td>
                        <td class="text-center">
                            <?= Html::a('Ver', ['view', 'id' => $model->IDperfil], ['class' => 'btn btn-xs btn-acao']) ?>
                            <?= Html::a('Editar', ['update', 'id' => $model->IDperfil], ['class' => 'btn btn-xs btn-acao']) ?>
                            <?= Html::a('Eliminar', ['delete', 'id' => $model->IDperfil], ['class' => 'btn btn-xs btn-acao', 'data-confirm' => 'Tem mesmo a certeza que pretende apagar este plano?', 'data-method' => 'post']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>
</div>