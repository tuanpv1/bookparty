<?php
use common\models\Book;
use common\models\Food;
use common\models\Package;
use common\models\User;
use kartik\datetime\DateTimePicker;
use kartik\grid\GridView;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<!-- content -->
<div class="content">
    <div class="container">
        <div class="cr-page-link">
            <a href="<?= Url::toRoute(['site/index'])?>">Trang chủ</a>
            <span>/</span>
            <a href="<?= $type==Book::TYPE_FOOD?Url::toRoute(['site/book','type'=>$type]):Url::toRoute(['site/book','type'=>$type])?>"><?= $type==Book::TYPE_FOOD?'Đặt cơm':'Đặt Tiệc'?></a>
        </div>
    </div>
    <div class="container">
        <div class="main-cm-1" id="headRs">
            <div class="top-bl-x">
                <span class="tit-x text-center"><?= $type==Book::TYPE_FOOD?'Đặt cơm':'Đặt Tiệc'?></span>
            </div>
            <div class="info-update">
                <?php $form = ActiveForm::begin([
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                    'method' => 'post',
                    'action' => ['site/order','type'=>$type],
                    'id' => 'change_pass'
                ]); ?>
                <?php
                if($type == Book::TYPE_FOOD) {
                    ?>
                    <div class="block-edit">
                        <?= $form->field($model, 'id_food')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(Food::find()->andWhere(['status' => Food::STATUS_ACTIVE])->all(), 'id', 'name'),
                                'options' => ['placeholder' => 'Chọn món ăn'],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'multiple' => true

                                ],
                            ]
                        )
                        ?>
                    </div>
                    <?php
                }
                if($type == Book::TYPE_PARTY) {
                    ?>
                    <div class="block-edit">
                        <?= $form->field($model, 'id_food')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(Package::find()->andWhere(['status' => Food::STATUS_ACTIVE])->all(), 'id', 'name'),
                                'options' => ['placeholder' => 'Chọn Loại gói tiệc'],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'multiple' => true

                                ],
                            ]
                        )->label('Chọn loại gói tiệc')
                        ?>
                    </div>
                    <?php
                }
                ?>
                <div class="block-edit">
                    <?= $form->field($model, 'name')->textInput() ?>
                </div>
                <?php
                if($type == Book::TYPE_FOOD) {
                    ?>
                    <div class="block-edit">
                        <?= $form->field($model, 'price')->textInput() ?>
                    </div>
                    <?php
                }
                ?>
                <div class="block-edit">
                    <?= $form->field($model, 'number')->textInput() ?>
                </div>
                <div class="block-edit">
                    <?= $form->field($model, 'address')->textInput(['placeholder' => 'Địa chỉ','class'=>'t-span', 'maxlength' => 100])->label('Địa chỉ') ?>
                </div>
                <div class="block-edit">
                    <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Số điện thoại','class'=>'t-span', 'maxlength' => 100])->label('Số điện thoại') ?>
                </div>

                <div class="block-edit">
                    <?=
                    $form->field($model, 'time')->widget(DateTimePicker::classname(), [
                        'options' => ['placeholder' => 'Chọn thời gian'],
                        'pluginOptions' => [
                            'autoclose'=>true
                        ]
                    ])->label('Thời gian nhận')
                    ?>
                </div>

                <div class="line-bt line-bt-3">
                    <?php
                    if($type == Book::TYPE_FOOD) {
                        ?>
                        <?= Html::a('Huỷ', ['food/index'], ['class' => 'bt-common-1 bt-st-2']) ?>
                        <a href="#" class="bt-common-1" onclick="document.getElementById('change_pass').submit()">Đặt cơm</a>
                        <?php
                    }
                    if($type == Book::TYPE_PARTY) {
                        ?>
                        <?= Html::a('Huỷ', ['package/index'], ['class' => 'bt-common-1 bt-st-2']) ?>
                        <a href="#" class="bt-common-1" onclick="document.getElementById('change_pass').submit()">Đặt tiệc</a>
                        <?php
                    }
                    ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<!-- end content -->