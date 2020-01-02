<<<<<<< HEAD


<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Plano */

$this->title = $model->nome;
\yii\web\YiiAsset::register($this);
?>
<div class="plano-view">
    <h4>
        <?php if ($model->treino == 1) {
            echo 'Plano de <strong>Treino: </strong>' . Html::encode($model->nome);
        } else {
            echo 'Plano de <strong>Nutrição: </strong>' . Html::encode($model->nome);
        }
        ?>
    </h4>
    <hr class="hr">
    <br>
    <textarea class="planos-textarea" disabled><?= $model->descricao ?></textarea>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->IDplano], ['class' => 'btn btn-azul']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->IDplano], [
            'class' => 'btn btn-vermelho',
            'data' => [
                'confirm' => 'Tem a certeza que pretende eliminar este plano?',
=======
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilPlano */

$this->title = $model->IDperfil;
$this->params['breadcrumbs'][] = ['label' => 'Perfil Planos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="perfil-plano-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'IDperfil' => $model->IDperfil, 'IDplano' => $model->IDplano], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'IDperfil' => $model->IDperfil, 'IDplano' => $model->IDplano], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
>>>>>>> Ricardo_API
                'method' => 'post',
            ],
        ]) ?>
    </p>

<<<<<<< HEAD
</div>
=======
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IDperfil',
            'IDplano',
            'dtaplano',
        ],
    ]) ?>

</div>
>>>>>>> Ricardo_API
