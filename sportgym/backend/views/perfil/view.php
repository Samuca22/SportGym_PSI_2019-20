<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */

$this->title = $modelPerfil->primeiroNome . ' ' . $modelPerfil->apelido;
\yii\web\YiiAsset::register($this);
?>
<div class="perfil-view">

    <div class="row">
        <div class="col-md-8">
            <h4>Ficha Sócio (Nº Sócio - <?= $modelPerfil->nSocio ?>)</h4>
        </div>
    </div>
    <hr class="hr">
    <br>


    <div class="row caixa-ver">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="caixa-ver-headers">
                        Informações Básicas
                    </div>
                </div>
            </div>
            <div class="row info">
                <div class="col-md-3">
                    <img src="data:image/png;base64,<?= base64_encode($modelPerfil->foto) ?>" height="200" width="200" />
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-sm-6">
                            <div>Nome</div>
                            <div class="form form-control"><?= $modelPerfil->primeiroNome ?> <?= $modelPerfil->apelido ?></div>
                        </div>
                        <div class="col-sm-6">
                            <div>Username</div>
                            <div class="form form-control"><?= $modelUser->username ?></div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        <div class="col-sm-6">
                            <div>Data de Nascimento:</div>
                            <div class="form form-control"><?= $modelPerfil->dtaNascimento ?></div>
                        </div>
                        <div class="col-sm-6">
                            <div>Género:</div>
                            <div class="form form-control">
                                <?php if ($modelPerfil->genero == 'M') : ?>
                                    <span>Masculino</span>
                                <?php else : ?>
                                    <span>Feminino</span>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="caixa-ver-headers">
                        Informações Adicionais
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div>Email</div>
                    <div class="form-control"><?= $modelUser->email ?></div>
                </div>

            </div>
            <div class="row" style="padding-top: 20px;">
                <div class="col-md-6">
                    <div>Nº Telefone</div>
                    <div class="form-control"><?= $modelPerfil->telefone ?></div>
                </div>
                <div class="col-md-6">
                    <div>Nº Contribuinte</div>
                    <div class="form-control"><?= $modelPerfil->nif ?></div>
                </div>
            </div>
            <div class="row" style="margin-top:20px;">
                <div class="col-md-4">
                    <div>Rua</div>
                    <div class="form-control"><?= $modelPerfil->rua ?></div>
                </div>
                <div class="col-md-4">
                    <div>Localidade</div>
                    <div class="form-control"><?= $modelPerfil->localidade ?></div>
                </div>
                <div class="col-md-4">
                    <div>Código Postal</div>
                    <div class="form-control"><?= $modelPerfil->cp ?></div>
                </div>
            </div>
            <div class="row" style="margin-top:20px;">
                <div class="col-md-12">
                    <p style="float:right;">
                        <?= Html::a('Editar', ['update', 'id' => $modelPerfil->IDperfil], ['class' => 'btn btn-azul']) ?>
                        <?= Html::a('Eliminar', ['delete', 'id' => $modelPerfil->IDperfil], [
                            'class' => 'btn btn-vermelho',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>
                </div>

            </div>
        </div>
    </div>




</div>