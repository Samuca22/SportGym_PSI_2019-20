<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilPlano */

$this->title = 'Associar Planos';
$this->params['breadcrumbs'][] = ['label' => 'Perfil Planos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="perfil-plano-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <table class="table table-bordered table-striped">
        <tr>
            <th>Nº Sócio</th>
            <th>Nome Sócio</th>
        </tr>
        <?php foreach ($perfis as $perfil) : ?>
            <tr>
                <td><?= Html::encode($perfil->nSocio) ?></td>
                <td><?= Html::encode($perfil->primeiroNome) . ' ' .  Html::encode($perfil->apelido)?></td>
            </tr>
        <?php endforeach; ?>
    </table>


</div>