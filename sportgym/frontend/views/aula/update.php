<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Aula */

$this->title = 'Update Aula: ' . $model->IDaula;
$this->params['breadcrumbs'][] = ['label' => 'Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDaula, 'url' => ['view', 'id' => $model->IDaula]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
