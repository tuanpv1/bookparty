<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 10/8/2016
 * Time: 9:46 AM
 */
use common\models\Campaign;
use common\models\DonationRequest;
use common\models\InfoCourse;
use common\models\LeadDonor;
use common\models\Maker;
use common\models\User;
use kartik\alert\Alert;
use yii\helpers\Url;
$active = 1;
?>
<div class="content">
    <div class="container">
        <div class="cr-page-link">
            <a href="<?= Url::toRoute(['site/index']) ?>">Trang chủ</a>
            <span>/</span>
            <a href="<?= Url::toRoute(['user/my-page', 'id' => Yii::$app->user->identity->id]) ?>">Cá nhân</a>
        </div>
    </div>
    <div class="container">
        <div class="main-cm-1">
            <div class="left-cn hidden-xs hidden-sm">
                <div class="block-cm-left top-cn-left">
                    <a href="<?= Url::toRoute(['user/update','id'=>$model->id])?>" class="bt-edit"><i class="fa fa-pencil"></i></a>
                    <?php $image = $model->getAvatar() ?>
                    <img src="<?= $image ?>"><br>
                    <h4><?= $model->fullname ?></h4>
                    <p><?= $model->address ?></p>
                </div>
                <div class="block-cm-left">
                    <span class="t-span">Số điện thoại</span><br>
                    <span class="b-span"><?= $model->phone ?></span>
                </div>
                <div class="block-cm-left">
                    <span class="t-span">Email</span><br>
                    <span class="b-span"><?= $model->email ?></span>
                </div>
                <div class="block-cm-left">
                    <span class="t-span">Giới tính</span><br>
                    <span class="b-span">
                        <?= User::getGenderName($model->gender)?>
                    </span>
                </div>
                <div class="block-cm-left">
                    <span class="t-span">Tuổi</span><br>
                    <span class="b-span"><?= User::getOld($model->birthday) ?></span>
                </div>
            </div>
            <div class="right-cn">
                <?php
                if(Yii::$app->user->identity->type == User::TYPE_STUDENTS) {
                    ?>
                    <div class="creat-cp">
                        <h4>Bạn cần chương trình học cao hơn?</h4>
                        <a href="<?= Url::toRoute(['donation-request/index']) ?>">ĐĂNG KÝ GÓI VIP</a>
                    </div>
                    <?php
                }
                ?>
                <div class="tab-ct">
                    <!-- Nav tabs -->
                    <div class="out-ul-tab ">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="hidden-lg hidden-md hidden-info"><a href="#t1" aria-controls="" role="tab" data-toggle="tab">Thông tin cá nhân</i></a></li>
                            <li role="presentation" class="<?= ($active == 1) ? 'active' : '' ?>"><a href="#t2" aria-controls="" role="tab" data-toggle="tab">Lịch sử nạp tiền</i></a></li>
                            <li role="presentation" class="<?= ($active == 2) ? 'active' : '' ?>"><a href="#t3" aria-controls="" role="tab" data-toggle="tab">Khóa học</a></li>
                            <li role="presentation" class="<?= ($active == 3) ? 'active' : '' ?>"><a href="#t4" aria-controls="" role="tab" data-toggle="tab">Bảng điểm</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane hidden-lg hidden-md hidden-info " id="t1">
                            <div class="block-cm-left top-cn-left">
                                <a href="<?= Url::toRoute(['user/update','id'=>$model->id])?>" class="bt-edit"><i class="fa fa-pencil"></i></a>
                                <?php $image = $model->getAvatar() ?>
                                <img src="<?= $image ?>"><br>
                                <h4><?= $model->fullname ?></h4>
                                <p><?= $model->address ?></p>
                            </div>
                            <div class="block-cm-left">
                                <span class="t-span">Số điện thoại</span><br>
                                <span class="b-span"><?= $model->phone ?></span>
                            </div>
                            <div class="block-cm-left">
                                <span class="t-span">Email</span><br>
                                <span class="b-span"><?= $model->email ?></span>
                            </div>
                            <div class="block-cm-left">
                                <span class="t-span">Giới tính</span><br>
                            <span class="b-span">
                                <?= User::getGenderName($model->gender)?>
                            </span>
                            </div>
                            <div class="block-cm-left">
                                <span class="t-span">Tuổi</span><br>
                                <span class="b-span"><?= User::getOld($model->birthday) ?></span>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane <?= ($active == 1) ? 'active' : '' ?>" id="t2">
                            <div class="list-item list-tab-2">

                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane <?= ($active == 2) ? 'active' : '' ?>" id="t3">
                            <div class="list-item list-tab-4">
                                <?php
                                if(isset($success)&&$success == 1) {
                                    echo kartik\alert\Alert::widget([
                                        'type' => kartik\alert\Alert::TYPE_SUCCESS,
                                        'title' => 'Hoàn thành! ',
                                        'titleOptions' => ['icon' => 'info-sign'],
                                        'body' => 'Đã nạp thẻ thành công mới bạn chọn giáo viên cho buổi học đầu tiên',
                                        'delay' => 10000
                                    ]);
                                }
                                if(isset($dataCourse)&& $dataCourse!= null) {
                                    ?>
                                    <div class="top-bl-x">
                                        <span class="tit-x text-center">Thông tin khóa học đã đăng kí</span>
                                    </div>
                                    <div class="out-tb-x">
                                        <table class="tb-x">
                                            <tr>
                                                <td>Họ và tên</td>
                                                <td>Khóa học</td>
                                                <td>Giá khóa học</td>
                                                <td>Thời gian bắt đầu</td>
                                                <td>Thời gian kết thúc</td>
                                                <td>Số giờ học</td>
                                                <td>Trạng thái khóa học</td>
                                            </tr>
                                            <?php
                                            foreach ($dataCourse as $value) {
                                                ?>
                                                <tr>
                                                    <td><?= Yii::$app->user->identity->fullname ? Yii::$app->user->identity->fullname : Yii::$app->user->identity->username ?></td>
                                                    <td><?php echo $value->id ?></td>
                                                    <td>
                                                        <?= Maker::formatNumber(InfoCourse::find()->andWhere(['id' => $value->id_info_course])->one()->price_course) ?>
                                                        VNĐ
                                                    </td>
                                                    <td><?php echo $value->date_start ?></td>
                                                    <td><?php echo $value->date_end ?></td>
                                                    <td>
                                                        <?= InfoCourse::find()->andWhere(['id' => $value->id_info_course])->one()->hours ?>
                                                        Giờ
                                                    </td>
                                                    <td><?php echo $value->status ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </table>
                                        <div class="col-md-12 text-center"><a href="<?=Yii::$app->getUrlManager()->getBaseUrl()?>/book/select_teacher">Mời chọn giáo viên để bắt đầu học</a></div>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="top-bl-x">
                                        <span class="tit-x text-center">Hiện bạn chưa đăng kí khóa học nào của LearnEnglish</span>
                                        <a class="text-center" href="<?= Url::toRoute(['info-course/index'])?>">Đăng kí ngay</a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane <?= ($active == 3) ? 'active' : '' ?>" id="t4">
                            <div class="list-item list-tab-5">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
