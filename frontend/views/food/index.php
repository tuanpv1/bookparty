<?php
use common\models\ListShift;
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
            <a href="<?= Url::toRoute(['teacher/index'])?>">Món ăn trong ngày</a>
        </div>
    </div>
    <div class="container">
        <div class="main-cm-1" id="headRs">
            <div class="top-bl-x">
                <span class="tit-x text-center">Danh sách Món ăn ngày <?= date('d/m/Y') ?></span>
            </div>
            <?php
            if(isset($food)) {
                foreach($food as $item) {
                    ?>
                    <div class="x-in-list">
                        <div class="thumb-common">
                            <img src="../img/blank2.gif">
                            <a href="<?= Url::toRoute(['user/view','id'=>$item->id])?>"><img class="thumb-cm" src="<?= $item->getImageLink() ?>"><br></a>
                        </div>
                        <h4><?= $item->name ?></h4>
                        <p><?= $item->des?$item->des:'Đang cập nhật' ?></p>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<!-- end content -->