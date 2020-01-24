<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'SportGym';
?>
<div class="img-container">
   <div class="homepage-img">
      <h1 class="text-center">Adira já por apenas 15,99€/mês!</h1>
      <br>
      <h3>Para mais informações preencha os campos abaixo</h3>


      <div class="home-form">
         <form action="">
            <div class="form-group">
               <label for="nome">Nome</label>
               <input type="text" name="nome" placeholder="Insira o seu nome" class="form-control">
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" placeholder="Insira o seu endereço de email" class="form-control">
            </div>
            <div class="form-group">
               <label for="telefone">Telefone</label>
               <input type="text" name="telefone" placeholder="Insira o seu número de telefone" class="form-control">
            </div>
            <button type="submit" class="btn btn-submeter btn-lg">SUBMETER</button>
         </form>
      </div>
   </div>
   <div class="my-container">
      <h2 class="text-center">Clubes</h2>
      <hr class="hr">
      <br>
      <div class="text-center">
         <div class="row">
            <?php foreach ($ginasio_dataProvider->models as $model) : ?>
               <div class="col-md-4">
                  <div class="back-image">
                     <div class="overlay">
                        <?= Html::a($model->localidade, ['/ginasio/index'], ['class' => 'btn btn-clube']) ?>
                     </div>
                  </div>
               </div>
            <?php endforeach; ?>
         </div>
      </div>
   </div>
</div>




<!--Meter Ginasios debiaxo do container-->