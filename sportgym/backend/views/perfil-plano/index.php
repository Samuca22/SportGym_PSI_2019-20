<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilPlano */

$this->title = 'Atribuir Planos'; ?>
<div class="perfil-plano-create">

    <h1>Atribuir Planos</h1>
    <hr>
    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <span style="color: #737373;font-size:14px;margin-top:30px;">Consultar</span>
    <div style="border: 1px solid #595959; padding:20px;">

        <?php echo $this->render('/perfil/_search', ['model' => $perfis_searchModel]);
        ?>

        <div style="overflow-y: scroll; Height: 400px; border: 1px solid #595959;">
            <table class="table table-bordered">
                <tr style="background: #3D77DF;">
                    <th style="width:20%">Número de Sócio</th>
                    <th>Nome</th>
                    <th style="width:20%">NIF</th>
                    <th style="width:20%">Género</th>
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