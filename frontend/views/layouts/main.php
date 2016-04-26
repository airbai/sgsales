<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap\Carousel;
AppAsset::register($this);
$this->registerCssFile('/css/site.css');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-cgs-top navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => '客服案例', 'url' => ['/cases/index']],
        ['label' => '产品特性', 'url' => ['/site/features']],
        ['label' => '价格详情', 'url' => ['/plan/index']],
        ['label' => '模板中心', 'url' => ['/templates/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => '注册/登录', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                '退出 (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
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

    <?php
    echo Carousel::widget([
        'items' => [
            // the item contains only the image
            '<img src="http://astatic.zaozuo.com.cn/299733ddbe89d6b317cc0e84c43999d4"/>',
            // equivalent to the above
            ['content' => '<img src="http://astatic.zaozuo.com.cn/b72f7289c65e0432ec3bd3646896a90a"/>'],
            // the item contains both the image and the caption
            [
                'content' => '<img src="http://astatic.zaozuo.com.cn/c1e644b49f478a8970e5b92d2a83d9ca"/>',
                'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
                'options' => [],
            ],
        ],
        'controls' => ['',''],
    ]);
     ?>


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
