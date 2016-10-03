<?php
use common\models\ListShift;
use common\models\Maker;
use common\models\User;
use kartik\grid\GridView;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\Shift;

?>
<!-- content -->
<div class="content">
    <div class="container">
        <div class="cr-page-link">
            <a href="<?= Url::toRoute(['site/index'])?>">Trang chủ</a>
            <span>/</span>
            <a href="<?= Url::toRoute(['teacher/index'])?>">Giá đặt tiệc</a>
        </div>
    </div>
    <div class="container">
        <div class="main-cm-1" id="headRs">
            <div class="top-bl-x">
                <span class="tit-x text-center"><br>Danh sách các giá gói đặt tiệc</span>
            </div>
            <div class="list-item block-x">
                <?php
                if(isset($package)) {
                    foreach($package as $item) {
                        ?>
                        <div class="news">
                            <div class="thumb-common">
                                <img height="250px" src="<?= $item->getImageLink() ?>" alt="">
                            </div>
                            <div class="if-cm-2">
                                <a href="<?= Url::to(['package/view','id'=>$item->id])?>"><h3 class="name-1"><?= $item->name?></h3><br></a>
                                <span>Giá <?= Maker::formatNumber($item->price) ?> VND</span><br>
                                <span class="des-cm-1"><b>Mô tả: </b><br><?= $item->des?$item->des:'Đang cập nhật'?> </span>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- end content -->