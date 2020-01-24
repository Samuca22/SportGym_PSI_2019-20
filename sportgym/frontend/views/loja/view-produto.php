<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Produto */

$this->title = $produto->nome;
\yii\web\YiiAsset::register($this);
?>
<div class="produto-view">
    <div class="row">
        <div class="col-xs-8">
            <h4><?= $produto->nome ?></h4>
        </div>
        <div class="col-xs-4">
            <div class="loja-btn-voltar">
                <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-azul']) ?>
            </div>
        </div>
    </div>
    <hr class="hr">
    <br>

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <?php if ($produto->fotoProduto == null) : ?>
                    <img src="<?= $produto->semImagem() ?>" height="200" width="200">
                <?php else : ?>
                    <img src="data:image/png;base64,<?= base64_encode($produto->fotoProduto) ?>" height="200" width="200">
                <?php endif; ?>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="view-produto-nome"><?= $produto->nome ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 view-produto-descricao">
                        <div><?= $produto->descricao ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="view-produto-preco"><?= $produto->precoProduto . '€' ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>