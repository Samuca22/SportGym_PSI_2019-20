<?php

use common\models\Aula;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilAula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-aula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelPerfilAula, 'nSocio')->textInput() ?>

    <?= $form->field($modelPerfilAula, 'IDaula')->dropDownList(
        ArrayHelper::map(Aula::find()->all(), 'IDaula', 'tipo'),
        [
            'prompt' => 'Selecione uma aula',
            'class' => 'form-control',
        ]
    ) ?>


    <div class="form-group">
        <?= Html::submitButton('Inscrever', ['class' => 'btn btn-azul']) ?>
        <?php ActiveForm::end(); ?>

    </div>
</div>