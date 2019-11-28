<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GinasioAula */

$this->title = 'Create Ginasio Aula';
$this->params['breadcrumbs'][] = ['label' => 'Ginasio Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ginasio-aula-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
