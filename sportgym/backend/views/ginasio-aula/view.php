<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\GinasioAula */

$this->title = $model->IDginasio;
$this->params['breadcrumbs'][] = ['label' => 'Ginasio Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ginasio-aula-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'IDginasio' => $model->IDginasio, 'IDaula' => $model->IDaula], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'IDginasio' => $model->IDginasio, 'IDaula' => $model->IDaula], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IDginasio',
            'IDaula',
        ],
    ]) ?>

</div>
