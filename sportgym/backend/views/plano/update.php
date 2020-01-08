<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Plano */

$this->title = $model->nome;
?>
<div class="plano-update">

    <h4>
        <?php if ($model->tipo == 0) {
            echo 'Plano de <strong>Treino: </strong>' . Html::encode($model->nome);
        } else {
            echo 'Plano de <strong>Nutrição: </strong>' . Html::encode($model->nome);
        }
        ?>
    </h4>
    <hr class="hr">
    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>