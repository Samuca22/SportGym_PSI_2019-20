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
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="/imgs/logo.png" width="60" height="25" id="navbar-img">SportGym',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-inverse navbar-fixed-top my-navbar',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menuItems = [
            ['label' => 'Clubes', 'url' => ['/ginasio/index'], 'linkOptions' => ['class' => 'navbar-a'], 'options' => ['class' => 'navbar-item']],
            ['label' => 'Sobre Nós', 'url' => ['/site/about'], 'linkOptions' => ['class' => 'navbar-a'], 'options' => ['class' => 'navbar-item']],
            ['label' => 'Login', 'url' => ['/site/login'], 'linkOptions' => ['class' => 'navbar-a'], 'options' => ['class' => 'navbar-item']],
        ];
    } else {
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index'], 'linkOptions' => ['class' => 'navbar-a'], 'options' => ['class' => 'navbar-item']],
            ['label' => 'Loja', 'url' => ['/loja/index'], 'linkOptions' => ['class' => 'navbar-a'], 'options' => ['class' => 'navbar-item']],
            ['label' => 'Clubes', 'url' => ['ginasio/index'], 'linkOptions' => ['class' => 'navbar-a'], 'options' => ['class' => 'navbar-item']],
            ['label' => 'Sobre Nós', 'url' => ['/site/about'], 'linkOptions' => ['class' => 'navbar-a'], 'options' => ['class' => 'navbar-item']],
            [
                'label' =>  'Minha Conta',
                'items' => [
                    ['label' => 'Meus Planos', 'url' => ['/perfil-plano/index']],
                    ['label' => 'Minhas Aulas', 'url' => ['perfil-aula/index']],
                    ['label' => 'Minhas Compras', 'url' => ['/venda/index']],
                    ['label' => 'Definições', 'url' => ['definicoes/index']],
                ],
                'options' => [
                    'class' => 'navbar-item'
                ],
                'linkOptions' => [
                    'class' => 'navbar-a',
                    'id' => 'minha-conta'
                ],
            ],
        ];

        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout navbar-a navbar-item']
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

    <?php $this->endBody() ?>
</body>

    </html>
<?php $this->endPage() ?>