<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilAula */

$this->title = $model->IDperfil;
$this->params['breadcrumbs'][] = ['label' => 'Perfil Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="perfil-aula-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'IDperfil' => $model->IDperfil, 'IDaula' => $model->IDaula], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'IDperfil' => $model->IDperfil, 'IDaula' => $model->IDaula], [
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
            'IDperfil',
            'IDaula',
        ],
    ]) ?>

</div>
