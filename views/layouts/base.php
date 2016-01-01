<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-11
 * Time: 上午10:02
 */
use app\assets\FontAsset;
use app\assets\LayoutAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

LayoutAsset::register($this);
FontAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script type="text/javascript">
        var url = location.href;
        var num = url.indexOf("?");
        str = url.substr(num + 1);
        window.onload = function () {
            //处理sidebar的height
            var sidebar = document.getElementById("sidebar");
            windowHeight = window.screen.height;
            height = windowHeight - $('header').height() - $('footer').height();
            sidebar.style.minHeight = height + 'px';
            //处理item选中样式
            var item = document.getElementById('layout-menu-item-1');
            item.className = "layout-menu-item text-left";
            if (str == 'r=home' || str == 'r=home/index' || str == 'r=home%2Findex') {
                var item1 = document.getElementById('layout-menu-item-1');
                item1.className = "layout-menu-item text-left layout-menu-active";
            } else if (str == 'r=dish' || str == 'r=dish/display') {
                var item2 = document.getElementById('layout-menu-item-2');
                item2.className = "layout-menu-item text-left layout-menu-active";
            }
        };
    </script>
</head>
<body>
<?php $this->beginBody() ?>
<header id="header" class="base-nav clearfix" style="overflow: hidden">
    <div class="container" style="width: 100%">
        <div class="navbar-brand">
            <a id="base_logo" href="<?php echo Url::to('index.php?r=home/index') ?>">
                <img src="<?php echo Url::to('@web/img/logo.png') ?>" alt="自助点餐系统" width="250">
            </a>

            <div id="base_menu" class="sidebar-collapse btn">
                <i class="fa fa-bars" data-icon1="fa fa-bars" data-icon2="fa fa-bars"></i>
            </div>
        </div>
        <div class="pull-right user">
            <div id="header-user">
                <a href="<?php echo Url::to('index.php?r=login/logout') ?>" class="user">
                    <img alt="" src="<?php echo Url::to('@web/img/default_head.png') ?>" style="max-height: 35px">
                    <span class="username">登出</span>
                </a>
            </div>
        </div>
    </div>
</header>
<section id="page">
    <div id='sidebar' class="sidebar">
        <div id="null" class="sidebar-menu nav-collapse">
            <div class="divide-20"></div>
            <div id="search-bar">
                <input id='search-input' class="search" placeholder="Search" type="text"><i
                    class="fa fa-search search-icon"></i>
            </div>
            <div class="divide-20"></div>
            <ul class="list-unstyled">
                <li>
                    <div id="layout-menu-item-1" class="layout-menu-item text-left layout-menu-active">
                        <a class="text-muted col-lg-12" href="<?php echo Url::to("index.php?r=home/index") ?>">
                            <i class="fa fa-tachometer fa-fw font-icon"></i> <span class="menu-text">控制台</span>
                            <span class="selected"></span>
                        </a>
                    </div>
                </li>
                <li class="divider"></li>
                <li>
                    <div id="layout-menu-item-2" class="layout-menu-item text-left">
                        <a class="text-muted col-lg-12" href="<?php echo Url::to("index.php?r=dish/display") ?>">
                            <i class="fa fa-th-large fa-fw font-icon"></i> <span class="menu-text">菜单展示</span>
                            <span class="selected"></span>
                        </a>
                    </div>
                </li>
                <li class="divider"></li>
                <li>
                    <div id="layout-menu-item-3" class="layout-menu-item text-left">
                        <a class="text-muted col-lg-12" href="<?php echo Url::to("index.php?r=dish/display") ?>">
                            <i class="fa fa-tachometer fa-fw font-icon"></i> <span class="menu-text">添加菜品</span>
                            <span class="selected"></span>
                        </a>
                    </div>
                </li>
                <li class="divider"></li>
                <li>
                    <div id="layout-menu-item-4" class="layout-menu-item text-left">
                        <a class="text-muted col-lg-12" href="">
                            <i class="fa fa-tachometer fa-fw font-icon"></i> <span class="menu-text">控制台</span>
                            <span class="selected"></span>
                        </a>
                    </div>
                </li>
                <li class="divider"></li>
                <li>
                    <div id="layout-menu-item-5" class="layout-menu-item text-left">
                        <a class="text-muted col-lg-12" href="">
                            <i class="fa fa-tachometer fa-fw font-icon"></i> <span class="menu-text">控制台</span>
                            <span class="selected"></span>
                        </a>
                    </div>
                </li>
                <li class="divider"></li>
                <li>
                    <div id="layout-menu-item-6" class="layout-menu-item text-left">
                        <a class="text-muted col-lg-12" href="">
                            <i class="fa fa-tachometer fa-fw font-icon"></i> <span class="menu-text">控制台</span>
                            <span class="selected"></span>
                        </a>
                    </div>
                </li>
                <li class="divider"></li>
                <li>
                    <div id="layout-menu-item-7" class="layout-menu-item text-left">
                        <a class="text-muted col-lg-12" href="">
                            <i class="fa fa-tachometer fa-fw font-icon"></i> <span class="menu-text">控制台</span>
                            <span class="selected"></span>
                        </a>
                    </div>
                </li>
                <li class="divider"></li>
            </ul>
        </div>
    </div>
    <div id="content" class="container" style="width: 100%">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</section>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
