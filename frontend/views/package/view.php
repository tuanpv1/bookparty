<?php
/**
 * Created by PhpStorm.
 * User: Linh
 * Date: 14/03/2016
 * Time: 11:28 AM
 */
use common\models\LeadDonor;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/** @var $model \common\models\Package */
/** @var $this \yii\web\View */

$this->title = 'Chi tiết gói '.$model->name;
?>

<div class="content">
    <div class="container">
        <div class="cr-page-link">
            <a href="<?= Url::toRoute(['site/index']) ?>">Trang chủ</a>
            <span>/</span>
            <a href="<?= Url::toRoute(['package/view', 'id' => $model->id]) ?>"><?= $model->name ?></a>
        </div>
    </div>
    <div class="container">
        <div class="main-cm-1">
            <div class="top-ct-1">
                <div class="left-top-ct">
                    <div class="thumb-common">
                        <img src="../img/blank.gif">
                        <a href="<?= Url::toRoute(['package/view', 'id' => $model->id]) ?>">
                            <img class="thumb-cm" src="<?= $model->getImageLink() ?>"><br>
                        </a>
                    </div>
                </div>
                <div class="i-f-right">
                    <h1><?= $model->name ?></h1>
                    <b><i>Nội dung gói:</i></b><br>
                    <div class="des-dt-1">
                        <?= $model->des?$model->des:'Đang cập nhật' ?>
                    </div><br><br>
                    <b><i>Chương trình ưu đãi:</i></b><br>
                    <div class="des-dt-1">
                        <?= $model->sale?'Hiện tại đang được giảm giá '.$model->sale.'%, Liên hệ ngay chúng tối để được hỗ trợ chi tiết':'Đang cập nhật' ?>
                    </div><br><br>
                    <b><i>Đặt tiệc ngay: </i><a href=""><img width="40px" src="<?= Yii::getAlias('@web')?>/img/add_cart.png" alt=""></a></b>
                </div>
            </div>
            <div class="tab-ct">
            </div>
        </div>

        <div class="block-ads-cp">
            <div class="left-block-ads">

            </div>
            <div class="right-block-ads">

            </div>
        </div>
    </div>
</div>