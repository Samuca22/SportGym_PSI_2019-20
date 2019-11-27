<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ginasio */

$this->title = 'Update Ginasio: ' . $model->IDginasio;
$this->params['breadcrumbs'][] = ['label' => 'Ginasios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDginasio, 'url' => ['view', 'id' => $model->IDginasio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ginasio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
