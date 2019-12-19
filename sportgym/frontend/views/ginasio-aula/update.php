<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GinasioAula */

$this->title = 'Update Ginasio Aula: ' . $model->IDginasio;
$this->params['breadcrumbs'][] = ['label' => 'Ginasio Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDginasio, 'url' => ['view', 'IDginasio' => $model->IDginasio, 'IDaula' => $model->IDaula]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ginasio-aula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
