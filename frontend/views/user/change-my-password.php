<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 11/8/2016
 * Time: 11:47 AM
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="content">
    <div class="container">

        <div class="box-login-page">
            <div class="form-login">
                <?php $form = ActiveForm::begin([
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                    'action'=>['user/change-my-password'],
                    'method' => 'post',
                    'id'=>'aaa',
                ]); ?>

                <div>
                    <?= $form->field($model, 'old_password')->passwordInput(['placeholder'=>'Nhập mật khẩu cũ'])->label('Mật khẩu cũ (*)') ?>
                </div>

                <div>
                    <?= $form->field($model, 'setting_new_password')->passwordInput(['placeholder'=>'Nhập mật khẩu mới'])->label('Mật khẩu mới (*)')  ?>
                </div>

                <div>
                    <?= $form->field($model, 'confirm_password')->passwordInput(['placeholder'=>'Xác nhận mật khẩu mới'])->label('Xác nhận mật khẩu mới (*)')  ?>
                </div>
                <div class="line-bt line-bt-3">
                    <?= Html::a('Hủy', ['user/my-page','id'=>Yii::$app->user->identity->id], ['class' => 'bt-common-1 bt-st-2']) ?>
                    <a href="#" class="bt-common-1" onclick="document.getElementById('aaa').submit()">Đổi mật khẩu</a>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>

    </div>
</div>
