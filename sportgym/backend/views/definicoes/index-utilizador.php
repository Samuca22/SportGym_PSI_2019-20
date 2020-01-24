<?php

/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\helpers\Html;

?>
<div class="row">
    <div class="col-md-8">
        <h4>Dados Pessoais</h4>
    </div>
    <div class="col-md-4">
        <p style="float:right;">
            <?= Html::a('Ginásios', ['index-ginasios'], ['class' => 'btn btn-azul']) ?>
            <?= Html::a('Dados Pessoais', ['index-utilizador'], ['class' => 'btn btn-azul']) ?>
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
                    Informações Básicas
                </div>
            </div>
        </div>
        <div class="row info">
            <div class="col-md-3">
                <div>Foto</div>
                <img src="data:image/png;base64,<?= base64_encode($perfil->foto) ?>" height="200" width="200" />
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-sm-6">
                        <div>Nome</div>
                        <div class="form form-control"><?= $perfil->primeiroNome ?> <?= $perfil->apelido ?></div>
                    </div>
                    <div class="col-sm-6">
                        <div>Username</div>
                        <div class="form form-control"><?= $user->username ?></div>
                    </div>
                </div>
                <div class="row" style="margin-top:20px;">
                    <div class="col-sm-6">
                        <div>Data de Nascimento:</div>
                        <div class="form form-control"><?= $perfil->dtaNascimento ?></div>
                    </div>
                    <div class="col-sm-6">
                        <div>Género:</div>
                        <div class="form form-control">
                            <?php if ($perfil->genero == 'M') : ?>
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
                <div class="form-control"><?= $user->email ?></div>
            </div>

        </div>
        <div class="row" style="padding-top: 20px;">
            <div class="col-md-6">
                <div>Nº Telefone</div>
                <div class="form-control"><?= $perfil->telefone ?></div>
            </div>
            <div class="col-md-6">
                <div>Nº Contribuinte</div>
                <div class="form-control"><?= $perfil->nif ?></div>
            </div>
        </div>
        <div class="row" style="margin-top:20px;">
            <div class="col-md-4">
                <div>Rua</div>
                <div class="form-control"><?= $perfil->rua ?></div>
            </div>
            <div class="col-md-4">
                <div>Localidade</div>
                <div class="form-control"><?= $perfil->localidade ?></div>
            </div>
            <div class="col-md-4">
                <div>Código Postal</div>
                <div class="form-control"><?= $perfil->cp ?></div>
            </div>
        </div>
        <div class="row" style="margin-top:20px;float:right;">
            <div class="col-md-12">
                <?= Html::a('Editar Dados Pessoais', ['update-utilizador', 'id' => $perfil->IDperfil], ['class' => 'btn btn-azul']) ?>
            </div>
        </div>
    </div>


</div>