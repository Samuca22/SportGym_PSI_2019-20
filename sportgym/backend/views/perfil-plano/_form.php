<?php

use Codeception\Command\Shared\Style;
use common\models\Plano;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilPlano */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-plano-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nSocio')->textInput(['class' => 'form-control form-criar']) ?>


    <?= $form->field($model, 'IDplano')->dropDownList(
        ArrayHelper::map(Plano::find()->all(), 'IDplano', 'nome'),
        [
           'prompt' => 'Selecione um plano',
           'class' => 'form-control form-criar',
        ]
    ) ?>



    <?= $form->field($model, 'dtaplano')->textInput(['class' => 'form-control form-criar']) ?>

    <div class="form-group">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-guardar']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>