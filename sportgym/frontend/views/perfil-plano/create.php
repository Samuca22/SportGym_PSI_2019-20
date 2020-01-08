<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilPlano */

$this->title = 'Criar Plano';
?>
<div class="perfil-plano-create">
    <div class="img-container">
        <div class="my-container meus-planos">
        <h3 class="text-center">Criar Plano</h3>
        <hr class="hr">
        <br>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>