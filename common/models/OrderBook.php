<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "order_book".
 *
 * @property integer $id
 * @property integer $id_book
 * @property integer $type
 * @property integer $id_food
 * @property integer $id_package
 * @property integer $number
 * @property integer $price
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class OrderBook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_book','type','id_food', 'id_package', 'number', 'price', 'status', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_book' => 'Id Book',
            'id_food' => 'Mã đồ ăn',
            'id_package' => 'Mã gói tiệc',
            'number' => 'Số lượng',
            'price' => 'Tổng tiền',
            'status' => 'Trạng thái',
            'type' => 'Type',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày thay đổi thông tin',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
