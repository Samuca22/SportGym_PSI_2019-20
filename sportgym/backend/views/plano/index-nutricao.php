<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PlanoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Planos Nutrição';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plano-index">

    <h1>Planos de Nutrição</h1>
    <hr>

    <?php echo $this->render('_search-nutricao', ['model' => $nutricao_searchModel]);
    ?>
    <?= GridView::widget([
        'dataProvider' => $nutricao_dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nome',
            'descricao',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <div style="text-align: center;">
        <p>
            <?= Html::a('Criar Novo Plano', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <br>
        <p style="text-align: center;">
            <?= Html::a('Ver Todos os Sócios com Planos Associados', ['/perfil-plano/index'], ['class' => 'btn btn-warning btn-lg']) ?>
        </p>
    </div>







</div>