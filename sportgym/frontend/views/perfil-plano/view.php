<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilPlano */

$this->title = $model->IDperfil;
$this->params['breadcrumbs'][] = ['label' => 'Perfil Planos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="perfil-plano-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'IDperfil' => $model->IDperfil, 'IDplano' => $model->IDplano], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'IDperfil' => $model->IDperfil, 'IDplano' => $model->IDplano], [
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
            'IDplano',
            'dtaplano',
        ],
    ]) ?>

</div>
