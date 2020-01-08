<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Plano */
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
