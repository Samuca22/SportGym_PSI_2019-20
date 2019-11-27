<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ginasio */

$this->title = 'Create Ginasio';
$this->params['breadcrumbs'][] = ['label' => 'Ginasios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ginasio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
