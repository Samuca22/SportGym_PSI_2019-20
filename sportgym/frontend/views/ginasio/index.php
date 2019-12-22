<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GinasioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clubes';

?>


<div class="ginasio-cotainer">
    <div class="ginasio-hero">
        <div class="ginasio-hero-copy">
            <h3>
                <center>Clubes</center>
            </h3>
            <hr class="hr">
            <br>
            <?php foreach ($ginasio_dataProvider->models as $model) : ?>
                <div class="col-md-4">
                    <div class="mostrar-ginasios">
                        <span><?= 'Sport Gym ' . $model->localidade ?></span><br>
                        <span style="color: #ffffff; font-size:16px; "><b>Morada: </b></span><br>
                        <span><?= $model->rua . ', ' . $model->cp ?></span><br>
                        <span style="color: #ffffff; font-size:16px; "><b>Contacto: </b></span><br>
                        <span><?= $model->telefone ?></span><br>
                        <span style="color: #ffffff; font-size:16px; "><b>Email: </b></span><br>
                        <span><?= $model->email ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
