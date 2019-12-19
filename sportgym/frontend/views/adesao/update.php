<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Adesao */

$this->title = 'Update Adesao: ' . $model->IDadesao;
$this->params['breadcrumbs'][] = ['label' => 'Adesaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDadesao, 'url' => ['view', 'id' => $model->IDadesao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="adesao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
