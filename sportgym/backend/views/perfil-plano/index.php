<?php

use common\models\Perfil;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PlanoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sócio Com Planos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plano-index">

    <h1>Sócios Com Planos</h1>
    <hr>

    <?php echo $this->render('_search', ['model' => $perfilPlano_searchModel]);
    ?>
    <br>

        <?= GridView::widget([
            'dataProvider' => $perfilPlanos_dataProvider,
            //'filterModel' => $perfilPlano_searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'IDperfil',
                [
                    'label' => 'Nº Sócio',
                    'attribute' => 'IDperfil',
                    'value' => function ($model) {
                        $perfis = Perfil::find()->where(['IDperfil' => $model->IDperfil])->one();
                        return $perfis->nSocio;
                    }
                ],
                [
                    'attribute' => 'Nome Sócio',
                    'value' => 'iDperfil.primeiroNome',
                ],
                'IDplano',
                [
                    'attribute' => 'Nome Plano',
                    'value' => 'iDplano.nome',
                ],


                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    <br>
    <p>
        <?= Html::a('Atribuir Plano de Treino', ['perfil-plano/create'], ['class' => 'btn btn-success']) ?>
    </p>







</div>