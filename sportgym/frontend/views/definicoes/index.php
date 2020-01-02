<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Definições';
?>
<div class="row" style="align-items: center; display: flex;">
    <div class="col-md-8">
        <h1>Definições</h1>
    </div>
    <div class="col-md-4">
        <span style="float: right;">
            <?= Html::a('Home', ['/perfil/view'], ['class' => 'btn btn-azulFront']) ?>
        </span>
    </div>
</div>
<hr>
<br>
    <div class="definicoes-form">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="email">Email</label>
                <div class="form form-control"><?= $modelUser->email ?></div>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <div class="form form-control"><?= $modelUser->username ?></div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="peso">Peso</label>
                        <div class="form form-control">
                            <?php if ($model->peso == null) : ?>
                                <span>N/A</span>
                            <?php else : ?>
                                <?= $model->peso . ' kg' ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="altura">Altura</label>
                        <div class="form form-control" >
                            <?php if ($model->altura == null) : ?>
                                <span>N/A</span>
                            <?php else : ?>
                                <?= $model->altura . ' m' ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>

            </div>
            <span style="float:right;">
                <?= Html::a('Editar Dados Pessoais', ['/definicoes/update', 'id' => $model->IDperfil], ['class' => 'btn btn-azulFront']) ?>
            </span>
        </div>
    </div>