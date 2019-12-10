<?php

use common\models\Perfil;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PerfilAulaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

<<<<<<< HEAD
$this->title = 'Sócios inscritos em aulas';
=======
$this->title = 'Sócios Inscritos';
>>>>>>> GoncaloAula
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-aula-index">

    <h1><?= Html::encode($this->title) ?></h1>

<<<<<<< HEAD
=======

>>>>>>> GoncaloAula
    <?php echo $this->render('_search', ['model' => $perfilAula_searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $perfilAula_dataProvider,
<<<<<<< HEAD
        // 'filterModel' => $perfilAula_searchModel,
        'columns' => [
            [
                'attribute' => 'Nº Socio',
                'value' => 'iDperfil.nSocio',
=======
        //'filterModel' => $perfilAula_searchModel,
        'columns' => [
            'IDperfil',
            [
                'label' => 'Nº Sócio',
                'attribute' => 'IDperfil',
                'value' => function ($model) {
                    $perfis = Perfil::find()->where(['IDperfil' => $model->IDperfil])->one();
                    return $perfis->nSocio;
                }
>>>>>>> GoncaloAula
            ],

            [
                'attribute' => 'Nome',
                'value' => 'iDperfil.primeiroNome',
            ],
            [
<<<<<<< HEAD
                'attribute' => 'Nome',
                'value' => 'iDperfil.apelido',
            ],
            [
                'attribute' => 'Nif',
                'value' => 'iDperfil.nif',
            ],
=======
                'attribute' => 'Apelido',
                'value' => 'iDperfil.apelido',
            ],
>>>>>>> GoncaloAula

            [
                'attribute' => 'Aula',
                'value' => 'iDaula.tipo',
            ],

<<<<<<< HEAD
            [
                'attribute' => 'Data',
                'value' => 'iDaula.dtaInicio',
            ],

=======

            //'dtaInicio',
            //'duracao',
            //'IDperfil',
            //'IDginasio',
>>>>>>> GoncaloAula

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
<<<<<<< HEAD
=======

>>>>>>> GoncaloAula
    ?>

    <p>
        <?= Html::a('Inscrever Sócio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>