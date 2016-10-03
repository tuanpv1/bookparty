<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\models\User;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<body>
<!--new nav begin-->
<div class="top-nav header">
    <div class="container">
        <a class="navbar-brand logo" href="<?= Url::toRoute(['site/index']) ?>"><img
                src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/img/logo.png" height="50"></a>

        <a class="ic-mn-mb hidden-mn" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </a>
        <div class="top-lead hidden-xs hidden-sm">
        </div>

    </div>
</div>
</div>
<div class="menu-mb hidden-mn">
    <div class="collapse" id="collapseExample">
        <div class="in-mn-mb">
            <div class="f-search">
                <?php $form = ActiveForm::begin([
                    'action' => Url::toRoute('site/search'),
                    'method' => 'GET'
                ]); ?>
                <input type="text" name="keyword" onfocus="this.select();" placeholder="Tìm kiếm "
                       value="<?= isset($_COOKIE['keyword']) && !empty($_COOKIE['keyword']) ? $_COOKIE['keyword'] : ''; ?>">
                <input type="hidden" name="search"
                       value="<?php echo str_replace(".php", "", "$_SERVER[REQUEST_URI]"); ?>">
                <i class="fa fa-search"></i>
                <?php ActiveForm::end(); ?>
            </div>

            <ul class="menu-web">
                <li class="active"><a href="<?= Url::toRoute(['site/index']) ?>">Trang chủ</a></li>
                <li><a href="<?= Url::toRoute(['package/index']) ?>">Giá đặt tiệc</a></li>
                <li><a href="<?= Url::toRoute(['site/about']) ?>">Giới thiệu</a></li>
                <li><a href="<?= Url::toRoute(['site/rules']) ?>">Nội quy</a></li>
            </ul>
            <?php
            if (Yii::$app->user->isGuest) {
                ?>
                <a href="<?= Url::toRoute(['site/login']) ?>" class="sign-in">Đăng nhập</a>
                <a href="<?= Url::toRoute(['site/signup']) ?>" class="sign-up">Đăng ký</a>
                <?php
            } else {
                ?>
                <div class="bb-login-ok">
                    <a data-toggle="collapse" href="#collapse-user" aria-expanded="false"
                       aria-controls="collapseExample">
                        Xin chào
                        <?= Yii::$app->user->identity->fullname?Yii::$app->user->identity->fullname:Yii::$app->user->identity->username ?>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="collapse-user">
                        <ul>
                            <?php
                            if(Yii::$app->user->identity->type == User::TYPE_ADMIN) {
                                ?>
                                <li><a href="<?= Url::toRoute(['user/update', 'id' => Yii::$app->user->identity->id]) ?>">Cá nhân</a></li>
                                <?php
                            }else {
                                ?>
                                <li><a href="<?= Url::toRoute(['user/my-page', 'id' => Yii::$app->user->identity->id]) ?>">Cá nhân</a></li>
                                <?php
                            }
                            if(Yii::$app->user->identity->type == User::TYPE_USER){
                                ?>
                                <li><a href="<?= Url::toRoute(['book/index', 'id' => Yii::$app->user->identity->id]) ?>">Đăng kí lịch học</a></li>
                                <?php
                            }
                            ?>
                            <li><a href="<?= Url::toRoute(['user/change-my-password', 'id' => Yii::$app->user->identity->id]) ?>">Đổi mật khẩu</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['site/logout']) ?>" data-method="post">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<nav class="bottom-nav hidden-xs hidden-sm">
    <div class="container">
        <ul class="menu-web">
            <li class="active"><a href="<?= Url::toRoute(['site/index']) ?>"><i class="fa fa-home hidden-md"></i>Trang chủ</a>
            </li>
            <li><a href="<?= Url::toRoute(['package/index']) ?>"> Giá đặt tiệc</a></li>
            <li><a href="<?= Url::toRoute(['site/about']) ?>">Giới thiệu</a></li>
            <li><a href="<?= Url::toRoute(['site/rules']) ?>">Nội quy</a></li>
            <div class="right-nav hidden-sm hidden-xs">

                <div class="f-search">
                    <?php $form = ActiveForm::begin([
                        'action' => Url::toRoute('site/search'),
                        'method' => 'GET'
                    ]); ?>
                    <input type="text" name="keyword" onfocus="this.select();" placeholder="Tìm kiếm "
                           value="<?= isset($_COOKIE['keyword']) && !empty($_COOKIE['keyword']) ? $_COOKIE['keyword'] : ''; ?>">
                    <input type="hidden" name="search"
                           value="<?php echo str_replace(".php", "", "$_SERVER[REQUEST_URI]"); ?>">
                    <i class="fa fa-search"></i>
                    <?php ActiveForm::end(); ?>
                </div>
                <?php
                if (Yii::$app->user->isGuest) {
                    ?>
                    <a href="<?= Url::toRoute(['site/login']) ?>" class="sign-in">Đăng nhập</a>
                    <a href="<?= Url::toRoute(['site/signup']) ?>" class="sign-up">Đăng ký</a>
                    <?php
                } else {
                    ?>
                    <div class="hello-us dropdown hidden-sm hidden-xs">
                        <a id="dLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Xin chào
                            <?= Yii::$app->user->identity->fullname?Yii::$app->user->identity->fullname:Yii::$app->user->identity->username ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <?php
                            if(Yii::$app->user->identity->type == User::TYPE_ADMIN) {
                                ?>
                                <li><a href="<?= Url::toRoute(['user/update', 'id' => Yii::$app->user->identity->id]) ?>">Cá nhân</a></li>
                                <?php
                            }else {
                                ?>
                                <li>
                                    <a href="<?= Url::toRoute(['user/my-page', 'id' => Yii::$app->user->identity->id]) ?>">Cá
                                        nhân</a></li>
                                <?php
                            }
                            if(Yii::$app->user->identity->type == User::TYPE_USER){
                                ?>
                                <li><a href="<?= Url::toRoute(['book/index', 'id' => Yii::$app->user->identity->id]) ?>">Đăng kí lịch học</a></li>
                                <?php
                            }
                            ?>
                            <li><a href="<?= Url::toRoute(['user/change-my-password', 'id' => Yii::$app->user->identity->id]) ?>">Đổi mật khẩu</a></li>
                            <li><a href="<?= Url::to(['site/logout']) ?>" data-method="post">Đăng xuất</a></li>
                        </ul>
                    </div>
                    <?php
                }
                ?>
            </div>
        </ul>
    </div><!-- /.container -->
</nav><!-- /.navbar -->
<?= \common\widgets\Alert::widget() ?>
<?= $content ?>
<div class="footer-block content-center">
    <div class="bottom-footer">
        <div class="container">

            <div class="copy-right">
                <h5>Comngon121</h5>
                Copyright © 2016. All rights reserved
            </div>
            <div class="social">
                <a href="" class="s-fb"><i class="fa fa-facebook"></i></a>
                <a href="" class="s-tw"><i class="fa fa-twitter"></i></a>
                <a href="" class="s-gg"><i class="fa fa-google"></i></a>
            </div>

        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script type="text/javascript">
    $(document).ready(function(){
        slider3 = $('.bxslider3').bxSlider({
            slideWidth: 180,
            minSlides: 2,
            maxSlides: 5,
            auto:true,
            speed: 500,
            slideMargin: 10,
            onSlideAfter : function($slideElement, oldIndex, newIndex) {
                slider3.stopAuto();
                slider3.startAuto();
            }
        });
    });
</script>
<script>

    $(document).ready(function() {

        $(".carousel").swiperight(function() {
            $(this).carousel('prev');
        });
        $(".carousel").swipeleft(function() {
            $(this).carousel('next');
        });

    }); /* END document ready */

</script>
