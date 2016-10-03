<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">
    <div class="container">

        <div class="box-login-page">
            <div class="form-login">
                <h3>Đăng Ký<a href="<?= Url::toRoute(['site/login']) ?>">Đăng nhập</a></h3>

                <?php $form = ActiveForm::begin([
                    'id' => 'form-signup',
                    'enableAjaxValidation' => false,
                    'enableClientValidation' =>true,
                ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>'Tên đăng nhập'])->label('Tên đăng nhập (*)') ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true,'placeholder'=>'Email'])->label('Email (*)') ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Mật khẩu'])->label('Mật khẩu (*)') ?>

                <?= $form->field($model, 'confirm_password')->passwordInput(['placeholder'=> 'Xác nhận mật khẩu'])->label('Nhập lại mật khẩu (*)') ?>

                <?= $form->field($model, 'phone_number')->textInput(['placeholder'=>'Số điện thoại']) ?>

                <?= $form->field($model, 'address')->textInput(['placeholder'=>'Địa chỉ']) ?>

                <?= $form->field($model, 'captcha')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="re-and-log re-and-log2">
                    <?= $form->field($model,'accept')->checkbox()->label('Tôi đồng ý với quy định và điều khoản của trang (*)')?>
                </div>

                <div class="text-center line-bt">
                    <a href="#" class="bt-common-1" onclick="document.getElementById('form-signup').submit()">ĐĂNG KÝ</a>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

