<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $searchModel common\models\PlanoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meus Planos';
?>

<div class="img-container">
    <div class="my-container meus-planos">
        <h3 class="text-center">Meus Planos</h3>
        <hr class="hr">
        <br>



        <div class="row">
            <div class="col-xs-6">
            <?= Html::a('Criar Plano', ['create'], ['class' => 'btn btn-lg btn-azul']) ?>
            </div>
            <div class="col-xs-6 meus-planos-caixa-pesquisa">
                <?php echo $this->render('_search', ['model' => $plano_searchModel]);
                ?>
            </div>
        </div>



        <div class="row">
            <div class="col-md-6">
                <h4 class="text-center">Planos de Treino</h4>
                <?php foreach ($plano_dataProvider->models as $model) : ?>
                    <?php if ($model->iDplano->tipo == '0') : ?>
                        <?= Html::a('<div class="mostrar-planos">
                                        <span>' . $model->iDplano->nome . '</span><br><br>
                                        <span>' . Yii::$app->formatter->asDate($model->dtaplano, 'dd-MM-yyyy') . '</span><br>
                                    </div>', ['view', 'IDplano' => $model->IDplano], ['class' => 'mostrar-planos-a']) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="col-md-6">
                <h4 class="text-center">Planos de Nutrição</h4>
                <?php foreach ($plano_dataProvider->models as $model) : ?>
                    <?php if ($model != null && $model->iDplano->tipo == '1') : ?>
                        <?= Html::a('<div class="mostrar-planos">
                                        <span>' . $model->iDplano->nome . '</span><br><br>
                                        <span>' . Yii::$app->formatter->asDate($model->dtaplano, 'dd-MM-yyyy') . '</span><br>
                                    </div>', ['view', 'IDplano' => $model->IDplano], ['class' => 'mostrar-planos-a']) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>