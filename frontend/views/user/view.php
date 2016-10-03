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
use yii\widgets\ActiveForm;

$active = 1;
?>
<div class="content">
    <div class="container">
        <div class="cr-page-link">
            <a href="<?= Url::toRoute(['site/index']) ?>">Trang chủ</a>
            <span>/</span>
            <a href="<?= Url::toRoute(['user/view', 'id' => $model->id]) ?>">Thông tin giảng viên</a>
        </div>
    </div>
    <div class="container">
        <div class="main-cm-1">
            <div class="left-cn hidden-xs hidden-sm">
                <div class="block-cm-left top-cn-left">
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
                <div class="tab-ct">
                    <!-- Nav tabs -->
                    <div class="out-ul-tab ">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="hidden-lg hidden-md hidden-info"><a href="#t1" aria-controls="" role="tab" data-toggle="tab">Thông tin cá nhân</i></a></li>
                            <li role="presentation" class="<?= ($active == 1) ? 'active' : '' ?>"><a href="#t2" aria-controls="" role="tab" data-toggle="tab">Giới thiệu</i></a></li>
                            <li role="presentation" class="<?= ($active == 2) ? 'active' : '' ?>"><a href="#t3" aria-controls="" role="tab" data-toggle="tab">Học viên đã dạy</a></li>
                            <li role="presentation" class="<?= ($active == 3) ? 'active' : '' ?>"><a href="#t4" aria-controls="" role="tab" data-toggle="tab">Đánh giá của học viên</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane hidden-lg hidden-md hidden-info " id="t1">
                            <div class="block-cm-left top-cn-left">
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
                                <b>Giới thiệu bản thân: </b><br><?= $model->about?$model->about:'Đang cập nhật'?>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane <?= ($active == 2) ? 'active' : '' ?>" id="t3">
                            <div class="list-item list-tab-4">
                                <?php
                                if(isset($student)) {
                                    foreach($student as $item) {
                                        ?>
                                        <div class="x-in-list">
                                            <div class="thumb-common">
                                                <img src="../img/blank2.gif">
                                                <a href="<?= Url::toRoute(['user/view','id'=>$item->id])?>"><img class="thumb-cm" src="<?= $item->getAvatar() ?>"><br></a>
                                            </div>
                                            <h4><?= $item->fullname?$item->fullname:$item->username ?></h4>
                                            <p><?= $item->about?$item->about:'Đang cập nhật' ?></p>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane <?= ($active == 3) ? 'active' : '' ?>" id="t4">
                            <div class="list-item list-tab-5">
                                <div class="box-comment">
                                    <div class="top-box-comment">
                                        <b>Bạn muốn chia sẻ?</b>
                                        <?php $form = ActiveForm::begin([
                                            'id' => 'comment-form'
                                        ]); ?>
                                        <div>
                                            <textarea rows="4" id="comment"></textarea>
                                        </div>
                                        <div class="line-bottom-comment">
                                            <span><i>Nhập ý kiến của bạn</i></span>
                                            <a onclick="feedBack($(this));" class="send-comment">Gửi ý kiến</a><br><br>
                                        </div>
                                        <?php ActiveForm::end(); ?>
                                    </div>
                                    <div class="list-comments">
                                        <div id="head-comment"></div>
                                        <?php if (isset($listComment) && !empty($listComment)) {
                                            foreach ($listComment as $item) {
                                                ?>
                                                <div class="comment-box-item">
                                                    <img
                                                        src="<?= $item->user->getAvatar() ? $item->user->getAvatar() : Yii::$app->request->baseUrl . '/img/avt_df.png' ?>">
                                                    <div class="left-comment">
                                                        <h5 class=""><?= $item->user->username ?> <span
                                                                class="time-up"><?= date('d/m/Y H:i:s', $item->updated_at) ?></span>
                                                        </h5>

                                                        <p><?= $item->content ?></p>
                                                    </div>
                                                </div>
                                            <?php }
                                        } else {
                                            echo "<span style='text-align: center'>Chưa có bình luận.</span>";
                                        } ?>
                                        <div id="last-comment"></div>
                                        <input type="hidden" name="page" id="page"
                                               value="<?= sizeof($listComment) - 1 ?>">
                                        <input type="hidden" name="numberCount" id="numberCount"
                                               value="<?= sizeof($listComment) ?>">
                                        <?php
                                        if (!isset($numberCheck) && $pages->totalCount > sizeof($listComment)) { ?>
                                            <div class="text-center" style="    padding-top: 20px;">
                                                <a id="more" onclick="readMore();" class="more-2">Xem thêm</a>
                                            </div>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    //readmore comment
    function readMore() {
        <!--$('#last-comment').html("<img style='margin-left: 33%;' src=<?=Yii::$app->request->baseUrl?>'/img/loading.gif' />");-->
        var url = '<?= Url::toRoute(['site/list-comments'])?>';
        var page = parseInt($('#page').val()) + 1;
        var numberCount = parseInt($('#numberCount').val()) + 10;
        $.ajax({
            url: url,
            data: {
                'contentId': <?= $model->id?>,
                'type': 'comment',
                'page': page,
                'number': <?= sizeof($listComment) ?>
            },
            type: "GET",
            crossDomain: true,
            dataType: "text",
            success: function (result) {
                if (null != result && '' != result) {
                    $(result).insertBefore('#last-comment');
                    document.getElementById("page").value = page + 9;
                    document.getElementById("numberCount").value = numberCount;
                    if (numberCount > <?= $pages->totalCount ?>) {
                        $('#more').css('display', 'none');
                    }

                    $('#last-comment').html('');
                } else {
                    $('#last-comment').html('');
                }

                return;
            },
            error: function (result) {
                alert('Không thành công. Quý khách vui lòng thử lại sau ít phút.');
                $('#last-comment').html('');
                return;
            }
        });//end jQuery.ajax
    }

    function backUrl() {
        location.href = '<?= \yii\helpers\Url::toRoute(['site/login']) ?>';
    }
    function feedBack(tag) {
        var check_user = '<?= Yii::$app->user->id ? 0 : 1 ?>';
        var page = parseInt($('#page').val()) + 1;
        var numberCount = parseInt($('#numberCount').val()) + 10;
        if (check_user == 1) {
            $('#msg3').html("Quý khách cần đăng nhập để thực hiện chức năng này");
            $('#notice-a1').click();
        } else {
            var text = 'undefined' != $.trim($('#comment').val()) ? $.trim($('#comment').val()) : '';
            if (null == text || '' == text) {
                alert("Không thành công. Qúy khách vui lòng nhập lời bình.");
                $('#comment').val('');
                $('#comment').focus();
                return;
            }
            $('#head-comment').html("<img style='margin-left: 33%;' src=<?=Yii::$app->request->baseUrl?>'/img/loading.gif' />");
            var url = '<?= Url::toRoute(['site/feedback'])?>';
            $.ajax({
                url: url,
                data: {
                    'contentId': <?= $model->id?>,
                    'content': text
                },
                type: "GET",
                crossDomain: true,
                dataType: "text",
                success: function (result) {
                    var rs = JSON.parse(result);
                    if (rs['success']) {
                        // var data = result['data'];
                        //$(html).insertAfter('#head-comment');
                        $('#head-comment').html('');
                        //alert(rs['message']);
                        $('#comment').val('');
                        var url = '<?= Url::toRoute(['site/list-comment'])?>';
                        $.ajax({
                            url: url,
                            data: {
                                'contentId': <?= $model->id?>,
                                'type': 1,//load lai comments
                                'page': 1,
                                'number': <?= sizeof($listComment) ?>
                            },
                            type: "GET",
                            crossDomain: true,
                            dataType: "text",
                            success: function (result) {
                                if (null != result && '' != result) {
                                    $('div .list-comments').html(result);
                                    document.getElementById("page").value = page + 9;
                                    document.getElementById("numberCount").value = numberCount;
                                    if (numberCount > <?= $pages->totalCount ?>) {
                                        $('#more').css('display', 'block');
                                    }
                                } else {
                                    $('#last-comment').html('');
                                }

                                return;
                            },
                            error: function (result) {
                                alert('Không thành công. Quý khách vui lòng thử lại sau ít phút.');
                                return;
                            }
                        });//end jQuery.ajax
                        return;
                    } else {
                        alert(rs['message']);
                        $('#head-comment').html('');
                    }

                },
                error: function (result) {
                    alert('Không thành công. Qúy khách vui lòng thử lại sau ít phút.');
                    $('#head-comment').html('');
                    return;
                }
            });//end jQuery.ajax
        }
    }
</script>
