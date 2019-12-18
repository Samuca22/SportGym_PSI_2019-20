<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilPlano */

$this->title = 'Atribuir Planos'; ?>
<div class="perfil-plano-index">

    <h3>Atribuir Planos</h3>
    <hr class="hr">
    <br>

    <div class="row">
        <div class="col-md-8">
            <span class="text-consulta">Consultar</span>
            <div class="border-consulta">
                <?php echo $this->render('/perfil/_search', ['model' => $perfis_searchModel]);
                ?>

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
        <div class="col-md-4">
            <?= $this->render('_form', ['modelPerfilPlano' => $modelPerfilPlano]) ?>
        </div>
    </div>




</div>