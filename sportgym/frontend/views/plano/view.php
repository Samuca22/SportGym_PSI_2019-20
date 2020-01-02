<?php

use yii\helpers\Html;
<<<<<<< HEAD
use yii\widgets\ActiveForm;
=======
>>>>>>> Ricardo_API
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Plano */

<<<<<<< HEAD
$this->title = $model->nome;
\yii\web\YiiAsset::register($this);
?>
<div class="plano-view">
    <h4>
        <?php if ($model->treino == 1) {
            echo 'Plano de <strong>Treino: </strong>' . Html::encode($model->nome);
        } else {
            echo 'Plano de <strong>Nutrição: </strong>' . Html::encode($model->nome);
        }
        ?>
    </h4>
    <hr class="hr">
    <br>
    <textarea class="planos-textarea" disabled><?= $model->descricao ?></textarea>

    

</div>
=======
$this->title = $model->IDplano;
$this->params['breadcrumbs'][] = ['label' => 'Planos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="plano-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IDplano], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IDplano], [
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
            'IDplano',
            'nome',
            'nutricao',
            'treino',
            'descricao',
        ],
    ]) ?>

</div>
>>>>>>> Ricardo_API
