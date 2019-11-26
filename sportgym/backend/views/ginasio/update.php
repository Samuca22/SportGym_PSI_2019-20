<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */

$this->title = 'Update Perfil: ' . $model->IDperfil;
$this->params['breadcrumbs'][] = ['label' => 'Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDperfil, 'url' => ['view', 'id' => $model->IDperfil]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
