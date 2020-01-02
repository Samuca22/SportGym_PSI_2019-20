<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="/imgs/logo.png" width="60" height="25" style="float:left;margin-right:15px;"> SportGym',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
<<<<<<< HEAD

    if (Yii::$app->user->isGuest) {
        $menuItems = [
            ['label' => 'Clubes', 'url' => ['/ginasio/index']],
            ['label' => 'Sobre Nós', 'url' => ['/sobre-nos/index']],
            ['label' => 'Login', 'url' => ['/site/login']],
        ];
    } else {
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Meus Planos', 'url' => ['/plano/index']],
            ['label' => 'Minhas Compras', 'url' => ['/venda/index']],
            ['label' => 'Mapa de Aulas', 'url' => ['perfil-aula/index']],
            ['label' => 'Clubes', 'url' => ['ginasio/index']],
            ['label' => 'Sobre Nós', 'url' => ['/sobre-nos/index']],
        ];

=======
    
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems = [
            ['label' => 'Loja', 'url' => ['/loja/index']],
        ];
>>>>>>> Ricardo_API
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';

    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<<<<<<< HEAD
<!--<footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; <?php //echo Html::encode('SportGym')
?> <?php //echo date('Y')
?></p>

            <p class="pull-right"><? //echo Yii::powered()
?></p>
        </div>
    </footer> -->

=======
>>>>>>> Ricardo_API
<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>