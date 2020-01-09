<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Definições';
?>

<div class="img-container">
    <div class="my-container definicoes">
        <h3 class="text-center">Definições</h3>
        <hr class="hr">
        <br>
        <div class="row">
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
                            <label>Peso</label>
                            <div class="form form-control">
                                <?php if ($model->peso == null) : ?>
                                    <span>N/A</span>
                                <?php else : ?>
                                    <?= $model->peso . 'kg' ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Altura</label>
                            <div class="form form-control">
                                <?php if ($model->altura == null) : ?>
                                    <span>N/A</span>
                                <?php else : ?>
                                    <?= $model->altura . 'cm' ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>

                </div>
                <span style="float:right;">
                    <?= Html::a('Editar Dados Pessoais', ['/definicoes/update', 'id' => $model->IDperfil], ['class' => 'btn btn-azul']) ?>
                </span>
            </div>
        </div>
    </div>
</div>