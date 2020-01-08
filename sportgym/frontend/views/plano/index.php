<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $searchModel common\models\PlanoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meus Planos';
?>
<div class="text-center">
    <h3><?= Html::encode($this->title) ?></h3>
</div>

<hr class="hr">
<br>

<?php //echo $this->render('_search', ['model' => $plano_searchModel]);
?>
<div class="row">
    <div class="col-md-6">
        <h4 class="text-center">Planos de Treino</h4>
        <?php foreach ($plano_dataProvider->models as $model) : ?>
            <?php if ($model != null) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($model->iDplano->treino == '1') { ?>
                            <div class="mostrar-planos">
                                <span><?= 'Plano - ' . $model->iDplano->nome ?></span><br><br>
                                <span><?= 'Data Plano - ' . $model->dtaplano ?></span><br>
                                <div class="butoes">
                                    <?= Html::a('Ver', ['view', 'id' => $model->IDplano], ['class' => 'btn btn-xs btn-acao']) ?>
                                    <?= Html::a('Eliminar', ['delete', 'IDperfil' => $model->IDperfil, 'IDplano' => $model->IDplano], [
                                        'class' => 'btn btn-xs btn-acao',
                                        'data-confirm' => 'Tem mesmo a certeza que pretende apagar este plano?', 'data-method' => 'post'
                                    ]) ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="col-md-6">
        <h4 class="text-center">Planos de Nutrição</h4>
        <?php foreach ($plano_dataProvider->models as $model) : ?>
            <?php if ($model != null) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($model->iDplano->nutricao == '1') { ?>
                            <div class="mostrar-planos">
                                <span><?= 'Plano - ' . $model->iDplano->nome ?></span><br><br>
                                <span><?= 'Data Plano - ' . $model->dtaplano ?></span><br>
                                <div class="butoes">
                                    <?= Html::a('Ver', ['view', 'id' => $model->IDplano], ['class' => 'btn btn-xs btn-acao']) ?>
                                    <?= Html::a('Eliminar', ['delete', 'IDperfil' => $model->IDperfil, 'IDplano' => $model->IDplano], [
                                        'class' => 'btn btn-xs btn-acao',
                                        'data-confirm' => 'Tem mesmo a certeza que pretende apagar este plano?', 'data-method' => 'post'
                                    ]) ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>