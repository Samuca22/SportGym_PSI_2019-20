<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilAula */

$this->title = 'Create Perfil Aula';
$this->params['breadcrumbs'][] = ['label' => 'Perfil Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-aula-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <table class="table table-bordered table-striped">
        <tr>
            <th>Nº Sócio</th>
<<<<<<< HEAD
            <th>Nome</th>
            <th>Aula</th>
=======
            <th>Nome Sócio</th>
>>>>>>> GoncaloAula
        </tr>
        <?php foreach ($perfis as $perfil) : ?>
            <tr>
                <td><?= Html::encode($perfil->nSocio) ?></td>
<<<<<<< HEAD
                <td><?= Html::encode($perfil->primeiroNome) . ' ' . Html::encode($perfil->apelido) ?></td>

            </tr>
        <?php endforeach; ?>


=======
                <td><?= Html::encode($perfil->primeiroNome) . ' ' .  Html::encode($perfil->apelido)?></td>
            </tr>
        <?php endforeach; ?>
>>>>>>> GoncaloAula
    </table>

</div>


