<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leitura Sensores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leitura-sensores-index">

    <h1><?= Html::encode($this->title) ?></h1>

<div class="caixa-tabela">
        <div class="panel">
            <table class="table table-bordered">
                <tr style="background: #3D77DF;">
                    <th>Temperatura</th>
                    <th>Humidade</th>
                    <th>Luminosidade</th>
                    <th>Descrição</th>
                </tr>
                <?php foreach ($dataProvider->models as $model) : ?>
                    <tr>
                        <?php if($model->temperatura <= 9): ?>
                            <td style="color: blue;"><?= $model->temperatura?></td>
                        <?php elseif($model->temperatura > 9 && $model->temperatura <= 19): ?>
                            <td style="color: orange;"><?= $model->temperatura?></td>
                        <?php else: ?>
                            <td style="color: red;"><?= $model->temperatura?></td>
                        <?php endif; ?> 

                        <td><?= $model->humidade?></td>
                        <td><?= $model->luminosidade ?></td>
                        <td><?= $model->descricao ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>


</div>
