<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Plano */

$this->title = $model->nome;
?>
<div class="plano-update">

    <h1>
        <?php if ($model->treino == 1) {
            echo 'Plano de <strong>Treino: </strong>' . Html::encode($model->nome);
        } else {
            echo 'Plano de <strong>Nutrição: </strong>' . Html::encode($model->nome);
        }
        ?>
    </h1>
    <hr>
    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>