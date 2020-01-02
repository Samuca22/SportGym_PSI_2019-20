<?php

use yii\helpers\Html;
use yii\grid\GridView;
<<<<<<< HEAD
use kartik\icons\Icon;


/* @var $this yii\web\View */
/* @var $searchModel common\models\PerfilPlanoSearch */
=======

/* @var $this yii\web\View */
>>>>>>> Ricardo_API
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfil Planos';
$this->params['breadcrumbs'][] = $this->title;
?>
<<<<<<< HEAD

<?php echo $this->render('_search', ['model' => $searchModel]);
?>


<h3>
    <center>Meus Planos</center>
</h3>
<hr class="hr">
<br>
<?php foreach ($dataProvider->models as $model) : ?>
    <div class="col-md-6">
        <div class="mostrar-planos">
            <span><?= 'Plano - ' . $model->iDplano->nome ?></span><br><br>
            <span><?= 'Data Plano - ' . $model->dtaplano ?></span><br>
            <div class="butoes">
                <?= Html::a('Ver', ['view', 'IDplano', 'IDperfil' => $model->IDplano], ['class' => 'btn btn-xs btn-acao']) ?>
                <?= Html::a('Editar', ['update', 'id' => $model->IDplano], ['class' => 'btn btn-xs btn-acao']) ?>
                <?= Html::a('Eliminar', ['delete', 'id' => $model->IDplano], [
                    'class' => 'btn btn-xs btn-acao',
                    'data-confirm' => 'Tem mesmo a certeza que pretende apagar este plano?', 'data-method' => 'post'
                ]) ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
=======
<div class="perfil-plano-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Perfil Plano', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDperfil',
            'IDplano',
            'dtaplano',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
>>>>>>> Ricardo_API
