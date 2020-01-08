<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

?>
<div class="row">
    <div class="col-md-8">
        <h4>Ginásios</h4>
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



<?php for ($i = 0; $i < count($ginasios); $i += 2) { ?>
    <div class="row">
        <div class="col-md-6">
            <span style="color: #737373;font-size:14px;"><?= $ginasios[$i]->localidade ?></span>
            <div class="caixa-consulta">
                <div class="row">
                    <div class="col-md-12">
                        <div class="caixa-ver-headers">
                            Ginásio - <?= $ginasios[$i]->localidade ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div>Email</div>
                        <div class="form form-control"><?= $ginasios[$i]->email ?></div>
                    </div>
                    <div class="col-md-4">
                        <div>Telefone</div>
                        <div class="form form-control"><?= $ginasios[$i]->telefone ?></div>
                    </div>
                </div>
                <div class="row" style="margin-top:20px;">
                    <div class="col-md-5">
                        <div>Rua</div>
                        <div class="form form-control"><?= $ginasios[$i]->rua ?></div>
                    </div>
                    <div class="col-md-4">
                        <div>Localidade</div>
                        <div class="form form-control"><?= $ginasios[$i]->localidade ?></div>
                    </div>
                    <div class="col-md-3">
                        <div>Código Postal</div>
                        <div class="form form-control"><?= $ginasios[$i]->cp ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div style="float:right;margin-top:10px;">
                            <?= Html::a('Atualizar Dados', ['update-ginasio', 'id' => $ginasios[$i]->IDginasio], ['class' => 'btn btn-acao-reverse', 'style' => 'padding:0;']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if($i != count($ginasios)-1): ?>
        <div class="col-md-6">
            <span style="color: #737373;font-size:14px;"><?= $ginasios[$i + 1]->localidade ?></span>
            <div class="caixa-consulta">
                <div class="row">
                    <div class="col-md-12">
                        <div class="caixa-ver-headers">
                            Ginásio - <?= $ginasios[$i + 1]->localidade ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div>Email</div>
                        <div class="form form-control"><?= $ginasios[$i + 1]->email ?></div>
                    </div>
                    <div class="col-md-4">
                        <div>Telefone</div>
                        <div class="form form-control"><?= $ginasios[$i + 1]->telefone ?></div>
                    </div>
                </div>
                <div class="row" style="margin-top:20px;">
                    <div class="col-md-5">
                        <div>Rua</div>
                        <div class="form form-control"><?= $ginasios[$i + 1]->rua ?></div>
                    </div>
                    <div class="col-md-4">
                        <div>Localidade</div>
                        <div class="form form-control"><?= $ginasios[$i + 1]->localidade ?></div>
                    </div>
                    <div class="col-md-3">
                        <div>Código Postal</div>
                        <div class="form form-control"><?= $ginasios[$i + 1]->cp ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div style="float:right;margin-top:10px;">
                            <?= Html::a('Atualizar Dados', ['update-ginasio', 'id' => $ginasios[$i + 1]->IDginasio], ['class' => 'btn btn-acao-reverse', 'style' => 'padding:0;']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
<?php } ?>

<div class="row">
    <div class="col-md-12">
        <div style="float:right;">
            <?= Html::a('Novo Estabelecimento', ['create-ginasio'], ['class' => 'btn btn-azul']) ?>
        </div>
    </div>
</div>