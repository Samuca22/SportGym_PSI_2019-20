<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Plano */

$this->title = $model->nome;
\yii\web\YiiAsset::register($this);
?>
<div class="perfil-plano-view">
    <h4>
        <?php if ($model->tipo == 0) {
            echo 'Plano de Treino: <strong>' . Html::encode($model->nome) . '</strong>';
        } else {
            echo 'Plano de Nutrição: <strong>' . Html::encode($model->nome) . '</strong>';
        }
        ?>
    </h4>
    <hr class="hr" style="margin-bottom:0;">
    <br>
    <div class="butoes">
        <?= Html::a('<img src="/imgs/lixo.png" height="36" width="36">', ['delete', 'IDplano' => $model->IDplano], [
            'class' => 'btn btn-eliminar-plano',
            'data-confirm' => 'Tem mesmo a certeza que pretende apagar este plano?', 'data-method' => 'post',
        ]) ?>
        <?= Html::a('<img src="/imgs/editar.png" height="36" width="36">', ['update', 'IDplano' => $model->IDplano], [
            'class' => 'btn btn-eliminar-plano',
        ]) ?>
    </div>
    <textarea class="planos-textarea" disabled><?= $model->descricao ?></textarea>
</div>