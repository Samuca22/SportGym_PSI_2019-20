<?php

use common\models\Perfil;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PerfilAulaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Sócios inscritos em aulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-aula-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $perfilAula_searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $perfilAula_dataProvider,
        // 'filterModel' => $perfilAula_searchModel,
        'columns' => [
            [
                'attribute' => 'Nº Socio',
                'value' => 'iDperfil.nSocio',
            ],
            [
                'attribute' => 'Nome',
                'value' => 'iDperfil.primeiroNome',
            ],
            [

                'attribute' => 'Apelido',
                'value' => 'iDperfil.apelido',
            ],
            [
                'attribute' => 'Nif',
                'value' => 'iDperfil.nif',
            ],
            [

                'attribute' => 'Apelido',
                'value' => 'iDperfil.apelido',
            ],
            [
                'attribute' => 'Aula',
                'value' => 'iDaula.tipo',
            ],
            [
                'attribute' => 'Data',
                'value' => 'iDaula.dtaInicio',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Inscrever Sócio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>