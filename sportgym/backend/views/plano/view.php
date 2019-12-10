<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Plano */

$this->title = $model->nome;
\yii\web\YiiAsset::register($this);
?>
<div class="plano-view">
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

    <textarea style="width: 100%;resize: none;" class="caixa-descricao" disabled><?= $model->descricao ?></textarea>




    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->IDplano], ['class' => 'btn btn-editar']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->IDplano], [
            'class' => 'btn btn-eliminar',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>