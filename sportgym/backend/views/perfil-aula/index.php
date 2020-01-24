<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $searchModel common\models\AulaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestão de Aulas';
?>
<div class="aula-index">

    <h3>Inscrever Sócios em
        Aulas <?= Html::a('Ver Mapa de Aulas', ['mapa-aulas'], ['class' => 'btn btn-lg btn-azul btn-ver-mapa', 'target' => '_blank']) ?></h3>
    <hr class="hr">
    <br>

    <?= $this->render('/perfil-aula/_form', ['modelPerfilAula' => $modelPerfilAula]) ?>


    <div class="row">
        <div class="col-md-12">
            <span class="text-consulta">Consultar</span>
            <div class="border-consulta">
                <?php echo $this->render('/perfil/_search', ['model' => $perfis_searchModel]); ?>
                <div class="caixa-tabela">
                    <div class="panel">
                        <table class="table table-bordered">
                            <tr style="background: #3D77DF;">
                                <th>Número de Sócio</th>
                                <th>Nome</th>
                                <th>NIF</th>
                                <th>Género</th>
                            </tr>
                            <?php foreach ($perfis_dataProvider->models as $model) : ?>
                                <tr>
                                    <td><?= $model->nSocio ?></td>
                                    <td><?= $model->primeiroNome . ' ' . $model->apelido ?></td>
                                    <td><?= $model->nif ?></td>
                                    <td>
                                        <?php if ($model->genero == 'M') { ?>
                                            <span>Masculino</span>
                                        <?php } else { ?>
                                            <span>Feminino</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top:30px;">
        <div class="col-md-12">
            <span class="text-consulta">Cancelar Inscrições</span>
            <div class="border-consulta">
                <div class="caixa-tabela" style="max-height:300px;">
                    <?= $this->render('/perfil-aula/_search', ['model' => $perfisaulas_searchModel]) ?>
                    <div class="panel">
                        <table class="table table-bordered">
                            <tr style="background: #3D77DF;">
                                <th>Sócio</th>
                                <th>Aula</th>
                                <th class="text-center">Ação</th>
                            </tr>
                            <?php foreach ($perfisaulas_dataProvider->models as $model) : ?>
                                <tr>
                                    <td><?= $model->iDperfil->nSocio . ' - ' . $model->iDperfil->primeiroNome . ' ' . $model->iDperfil->apelido ?></td>
                                    <td><?= $model->iDaula->tipo ?></td>
                                    <td class="text-center">
                                        <?=
                                        Html::a('Cancelar Inscrição', ['delete', 'IDperfil' => $model->IDperfil, 'IDaula' => $model->IDaula], [
                                            'class' => 'btn btn-acao',
                                            'data' => [
                                                'confirm' => 'Tem a certeza que pretende cancelar esta inscrição?',
                                                'method' => 'post',
                                            ],
                                        ])
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>