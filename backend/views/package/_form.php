<?php

use common\models\Package;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Package */
/* @var $form yii\widgets\ActiveForm */
$avatarPreview = !$model->isNewRecord && !empty($model->image);
?>

<div class="form-body">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'fullSpan' => 8,
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->widget(\kartik\file\FileInput::classname(), [
        'pluginOptions' => [

            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' => 'Chọn hình ảnh món ăn',
            'initialPreview' => $avatarPreview ? [
                Html::img(Yii::getAlias('@web') . '/' . Yii::getAlias('@image_package') . "/" . $model->image, ['class' => 'file-preview-image', 'style' => 'width: 100%;']),

            ] : [],
        ],
        'options' => [
            'accept' => 'image/*',
        ],

    ]);
    ?>
    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['Chọn trạng thái'=>Package::getListStatus()]) ?>

    <?= $form->field($model, 'sale')->textInput() ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'des')->textarea(['rows' => 6]) ?>

    <div class="row text-center">
        <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Hủy', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
