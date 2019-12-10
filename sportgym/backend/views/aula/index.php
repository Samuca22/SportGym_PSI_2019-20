<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\bootstrap;


/* @var $this yii\web\View */
/* @var $searchModel common\models\AulaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aulas';
$this->params['breadcrumbs'][] = $this->title;
?>

<center><table width=1100 border=”2″>
    <p>
    <h3><center>MAPA DE AULAS</h3>
    </P>
    <br><br>
    <tr>
        <td width=50><center>HORA</td>
        <td width=100><center>SEGUNDA-FEIRA</td>
        <td width=100><center>TERÇA-FEIRA</td>
        <td width=100><center>QUARTA-FEIRA</td>
        <td width=100><center>QUINTA-FEIRA</td>
        <td width=100><center>SEXTA-FEIRA</td>
        <td width=100><center>SÁBADO</td>
    </tr>
    <tr>
        <td height=25><center>08:00h</td>
        <td height=25><center>CYCLING</td>
        <td height=25><center>YOGA</td>
        <td height=25><center></td>
        <td height=25><center>PUMP</td>
        <td height=25><center></td>
        <td height=25><center>PILATES</td>
    </tr>

        <tr>
            <td height=25><center>09:30h</td>
            <td height=25><center>BARRIGA KILLER</td>
            <td height=25><center>CYCLING</td>
            <td height=25><center></td>
            <td height=25><center>CYCLING</td>
            <td height=25><center>CYCLING</td>
            <td height=25><center></td>
        </tr>
        <tr>
            <td height=25><center>11:00h</td>
            <td height=25><center></td>
            <td height=25><center>ZUMBA</td>
            <td height=25><center>CYCLING</td>
            <td height=25><center>YOGA</td>
            <td height=25><center>ZUMBA</td>
            <td height=25><center>BARRIGA KILLER</td>
        </tr>
        <tr>
            <td height=25><center>12:30h</td>
            <td height=25><center>BODY JUMP</td>
            <td height=25><center></td>
            <td height=25><center></td>
            <td height=25><center>BODY JUMP</td>
            <td height=25><center></td>
            <td height=25><center></td>
        </tr>
        <tr>
            <td height=25><center>14:00h</td>
            <td height=25><center>PUMP</td>
            <td height=25><center></td>
            <td height=25><center>PILATES</td>
            <td height=25><center></td>
            <td height=25><center></td>
            <td height=25><center>CYCLING</td>
        </tr>
        <tr>
            <td height=25><center>16:00h</td>
            <td height=25><center></td>
            <td height=25><center></td>
            <td height=25><center></td>
            <td height=25><center></td>
            <td height=25><center>BARRIGA KILLER</td>
            <td height=25><center></td>
        </tr>
        <tr>
            <td height=25><center>17:30h</td>
            <td height=25><center>STEP</td>
            <td height=25><center>TRX</td>
            <td height=25><center></td>
            <td height=25><center></td>
            <td height=25><center>KICK BOXING</td>
            <td height=25><center></td>
        </tr>
        <tr>
            <td height=25><center>19:00h</td>
            <td height=25><center>3B</td>
            <td height=25><center>HIT</td>
            <td height=25><center>3B</td>
            <td height=25><center>TRX</td>
            <td height=25><center>STEP</td>
            <td height=25><center></td>
        </tr>
        <tr>
            <td height=25><center>19:30h</td>
            <td height=25><center>COMBAT</td>
            <td height=25><center>BARRIGA KILLER</td>
            <td height=25><center>KICK BOXING</td>
            <td height=25><center>COMBAT</td>
            <td height=25><center>HIT</td>
            <td height=25><center></td>
        </tr>
        <tr>
            <td height=25><center>20:00h</td>
            <td height=25><center>CYCLING</td>
            <td height=25><center>CYCLING</td>
            <td height=25><center>CYCLING</td>
            <td height=25><center>CYCLING</td>
            <td height=25><center>CYCLING</td>
            <td height=25><center></td>
        </tr>
        <tr>
            <td height=25><center>21:00h</td>
            <td height=25><center>HIT</td>
            <td height=25><center>BODY JUMP</td>
            <td height=25><center>HIT</td>
            <td height=25><center>3B</td>
            <td height=25><center>BODY JUMP</td>
            <td height=25><center></td>
        </tr>

</table></center>

<div class="aula-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Nova Aula', ['create'], ['class' => 'btn btn-success']) ?>
    </p>



    <?= GridView::widget([
        'dataProvider' => $aula_dataProvider,
        'columns' => [

            'tipo',
            'duracao',
            //'IDperfil',
            //'IDginasio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

    ?>

    <div style="text-align: center;">

        <br>
        <p style="text-align: center;">
            <?= Html::a('Ver todas as inscrições', ['/perfil-aula/index'], ['class' => 'btn btn-warning btn-lg']) ?>
        </p>
    </div>






