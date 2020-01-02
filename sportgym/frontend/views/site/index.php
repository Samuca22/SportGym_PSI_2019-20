<?php

/* @var $this yii\web\View */ 
use yii\helpers\Html;

$this->title = 'SportGym';
?>
<div class="home-container">
   <div class="homepage">
      <h1>Adira já por apenas 15,99€/mês!</h1>
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
            <button type="submit" class="btn btn-submeter btn-lg">Submeter</button>
         </form>
      </div>
   </div>
   <div class="clubes-container-home">
      <div class="clubes-home">
         <div class="clubes-home-copy">
            <h1>Clubes</h1>
         </div>
         <hr class="hr-clubes">
         <br>
         <?php foreach ($ginasio_dataProvider->models as $model) : ?>
            <div class="col-md-4">
               <div class="mostrar-clubes">
                  <p>
                     <?= Html::a($model->localidade, ['/ginasio/index'], ['class' => 'btn btn-clube']) ?>
                  </p>
               </div>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
</div>




<!--Meter Ginasios debiaxo do container-->