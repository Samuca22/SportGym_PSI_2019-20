<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Plano */

<<<<<<< HEAD
$this->title = $model->nome;
?>
<div class="plano-update">

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
=======
$this->title = 'Update Plano: ' . $model->IDplano;
$this->params['breadcrumbs'][] = ['label' => 'Planos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDplano, 'url' => ['view', 'id' => $model->IDplano]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="plano-update">

    <h1><?= Html::encode($this->title) ?></h1>
>>>>>>> Ricardo_API

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

<<<<<<< HEAD
</div>
=======
</div>
>>>>>>> Ricardo_API
