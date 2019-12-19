<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilAula */

$this->title = 'Update Perfil Aula: ' . $model->IDperfil;
$this->params['breadcrumbs'][] = ['label' => 'Perfil Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDperfil, 'url' => ['view', 'IDperfil' => $model->IDperfil, 'IDaula' => $model->IDaula]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfil-aula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
