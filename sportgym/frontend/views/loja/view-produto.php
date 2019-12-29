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
        <div class="col-md-8">
            <h4><?= $produto->nome ?></h4>
        </div>
        <div class="col-md-4">
            <p style="float:right;">
                <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-azul']) ?>
            </p>
        </div>
    </div>
    <hr class="hr">
    <br>

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <img src="<?= $produto->mostrarImagem() ?>" width="200" height="200">
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-sm-12">
                        <div style="font-weight:bold;font-size:28px;"><?= $produto->nome ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12" style="margin-top:20px;">
                        <div><?= $produto->descricao ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12" style="margin-top:20px;">
                        <div style="font-weight:bold;font-size:28px;"><?= $produto->precoProduto . '€' ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>