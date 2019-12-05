<?php

use yii\grid\GridView;

?>

    <h4> LISTA GINÁSIOS</h4>
<?= GridView::widget([
    'dataProvider' => $ginasio_dataProvider,
    'columns' => [

        'localidade',
        'rua',
        'cp',
        'email:email',
        'telefone',


        ['class' => 'yii\grid\ActionColumn'],
    ],
]);



?>