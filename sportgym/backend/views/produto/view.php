<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Produto */

$this->title = $model->nome;
\yii\web\YiiAsset::register($this);
?>
<div class="produto-view">

    <div class="row">
        <div class="col-md-8">
            <h4>Detalhes Produto - <?= $model->nome ?></h4>
        </div>
        <div class="col-md-4">
            <p style="float:right;">
                <?= Html::a('Editar', ['update', 'id' => $model->IDproduto], ['class' => 'btn btn-azul']) ?>
                <?= Html::a('Eliminar', ['delete', 'id' => $model->IDproduto], [
                    'class' => 'btn btn-vermelho',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>
    </div>
    <hr class="hr">
    <br>

    <div class="row caixa-ver">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="caixa-ver-headers">
                        Detalhes Produto
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div>Foto</div>
                    <img src="<?= $model->mostrarImagem() ?>" width="200" height="200">
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-sm-12">
                            <div>Nome</div>
                            <div class="form form-control"><?= $model->nome ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12" style="margin-top:20px;">
                            <div>Descrição</div>
                            <textarea class="produtos-textarea" disabled><?= $model->descricao ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" style="margin-top:20px;">
                    <div>Valor do Produto</div>
                    <div class="form form-control"><?= $model->precoProduto . '€' ?></div>
                </div>
            </div>
        </div>

    </div>
</div>