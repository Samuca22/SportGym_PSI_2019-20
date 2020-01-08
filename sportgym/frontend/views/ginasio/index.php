<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\GinasioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clubes';
?>


<div class="img-container">
    <div class="clubes-img">
        <div class="ginasio-container">
            <h3 class="text-center">Clubes</h3>
            <hr class="hr">
            <br>
            <div class="row">
                <?php foreach ($ginasio_dataProvider->models as $model) : ?>
                    <div class="col-lg-4">
                        <div class="clubes">
                            <span class="clubes-localidade"><?= $model->localidade ?></span>
                            <hr class="hr">
                            <span class="clubes-dados"><b>Morada: </b></span><br>
                            <span><?= $model->rua . ', ' . $model->cp ?></span><br>
                            <span class="clubes-dados"><b>Contacto: </b></span><br>
                            <span><?= $model->telefone ?></span><br>
                            <span class="clubes-dados"><b>Email: </b></span><br>
                            <span><?= $model->email ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>