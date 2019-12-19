<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PerfilAulaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfil Aulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3>MAPA DE AULAS</h3>
<hr class="hr">
<br>
<div class="panel">
    <table id="table-aulas" class="table table-bordered">
        <tr style="background-color: #3D77DF;">
            <td>HORA</td>
            <td>SEGUNDA-FEIRA</td>
            <td>TERÇA-FEIRA</td>
            <td>QUARTA-FEIRA</td>
            <td>QUINTA-FEIRA</td>
            <td>SEXTA-FEIRA</td>
            <td>SÁBADO</td>
        </tr>
        <tr>
            <td>09:00h</td>
            <td>CYCLING</td>
            <td></td>
            <td></td>
            <td></td>
            <td>ADAPTIVE BOX</td>
            <td></td>
        </tr>

        <tr>
            <td>10:30h</td>
            <td>BARRIGA KILLER</td>
            <td></td>
            <td></td>
            <td>PUMP</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>12:00h</td>
            <td></td>
            <td></td>
            <td>CROSS MOVES</td>
            <td></td>
            <td></td>
            <td>X-CELERATE</td>
        </tr>
        <tr>
            <td>13:30h</td>
            <td></td>
            <td>TRX</td>
            <td></td>
            <td></td>
            <td>COMBINE TRAINING</td>
            <td>COMBAT</td>
        </tr>
        <tr>
            <td>15:00h</td>
            <td>MEGA CALORIE BURN</td>
            <td></td>
            <td>PILATES</td>
            <td>POWERJUMP</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>16:30h</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>18:00h</td>
            <td></td>
            <td>FAT BURN</td>
            <td></td>
            <td></td>
            <td>BOOT CAMP</td>
            <td></td>
        </tr>
        <tr>
            <td>19:30h</td>
            <td>SPARTANS</td>
            <td></td>
            <td></td>
            <td></td>
            <td>INSANITY</td>
            <td></td>
        </tr>
        <tr>
            <td>21:00h</td>
            <td>BODY ATTACK</td>
            <td></td>
            <td>CROSSFIT</td>
            <td>HIT</td>
            <td></td>
            <td></td>
        </tr>
    </table>
</div>

<div class="perfil-aula-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Perfil Aula', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDperfil',
            'IDaula',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
