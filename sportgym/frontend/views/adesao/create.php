<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Adesao */

$this->title = 'Create Adesao';
$this->params['breadcrumbs'][] = ['label' => 'Adesaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adesao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
