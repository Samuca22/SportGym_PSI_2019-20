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
    <textarea class="texto-textarea" disabled><?= $model->descricao ?></textarea>

    <p>
    <?= Html::a('Editar', ['update', 'id' => $model->IDplano], ['class' => 'btn btn-azul']) ?>
    <?= Html::a('Eliminar', ['delete', 'id' => $model->IDplano], [
        'class' => 'btn btn-vermelho',
        'data' => [
            'confirm' => 'Tem a certeza que pretende eliminar este plano?',
            'method' => 'post',
        ],
    ]) ?>
</p>

</div>