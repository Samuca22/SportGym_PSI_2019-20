<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilPlano */

$this->title = 'Update Perfil Plano: ' . $model->IDperfil;
$this->params['breadcrumbs'][] = ['label' => 'Perfil Planos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDperfil, 'url' => ['view', 'IDperfil' => $model->IDperfil, 'IDplano' => $model->IDplano]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfil-plano-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
