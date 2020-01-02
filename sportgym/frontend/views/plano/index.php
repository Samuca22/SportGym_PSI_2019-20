<?php

use yii\helpers\Html;
<<<<<<< HEAD

/* @var $this yii\web\View */
/* @var $searchModel common\models\PlanoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meus Planos';
?>
<h3>
    <center><?= Html::encode($this->title) ?></center>
</h3>
<hr class="hr">
<br>

<h4>
    <center>PLANOS DE TREINO</center>
</h4>

<?php echo $this->render('_search-treino', ['model' => $plano_searchModel]);
?>

<?php foreach ($plano_dataProvider->models as $model) : ?>
    <?php if ($model->iDplano->treino == '1') { ?>
        <div class="col-md-6">
            <div class="mostrar-planos">
                <span><?= 'Plano - ' . $model->iDplano->nome ?></span><br><br>
                <span><?= 'Data Plano - ' . $model->dtaplano ?></span><br>
                <div class="butoes">
                    <?= Html::a('Ver', ['view', 'id' => $model->IDplano], ['class' => 'btn btn-xs btn-acao']) ?>
                    <?= Html::a('Eliminar', ['delete', 'IDperfil' => $model->IDperfil, 'IDplano' => $model->IDplano], [
                        'class' => 'btn btn-xs btn-acao',
                        'data-confirm' => 'Tem mesmo a certeza que pretende apagar este plano?', 'data-method' => 'post']) ?>
                </div>

            </div>
        </div>
    <?php } ?>
<?php endforeach; ?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<h4>

    <center>PLANOS DE NUTRIÇÃO</center>
</h4>

<?php echo $this->render('_search-treino', ['model' => $plano_searchModel]);
?>

<?php foreach ($plano_dataProvider->models as $model) : ?>
    <?php if ($model->iDplano->nutricao == '1') { ?>
        <div class="col-md-6">
            <div class="mostrar-planos">
                <span><?= 'Plano - ' . $model->iDplano->nome ?></span><br><br>
                <span><?= 'Data Plano - ' . $model->dtaplano ?></span><br>
                <div class="butoes">
                    <?= Html::a('Ver', ['view', 'id' => $model->IDplano], ['class' => 'btn btn-xs btn-acao']) ?>
                    <?= Html::a('Eliminar', ['delete', 'IDperfil' => $model->IDperfil, 'IDplano' => $model->IDplano], [
                        'class' => 'btn btn-xs btn-acao',
                        'data-confirm' => 'Tem mesmo a certeza que pretende apagar este plano?', 'data-method' => 'post']) ?>
                </div>

            </div>
        </div>
    <?php } ?>
<?php endforeach; ?>
=======
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Planos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plano-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Plano', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDplano',
            'nome',
            'nutricao',
            'treino',
            'descricao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
>>>>>>> Ricardo_API
