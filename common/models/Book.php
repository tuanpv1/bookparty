<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $name
 * @property string $address
 * @property integer $time
 * @property integer $status
 * @property string $note
 * @property integer $phone
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $type
 * @property integer $price
 */
class Book extends \yii\db\ActiveRecord
{
    // KIỂU Đặt hàng
    const TYPE_FOOD = 10;
    const TYPE_PARTY = 9;

    public  function  getListType(){
        $list2 = [
            self::TYPE_FOOD => 'Đặt cơm',
            self::TYPE_PARTY => 'Đặt tiệc',
        ];

        return $list2;
    }

    public function getTypeName()
    {
        $lst = self::getListType();
        if (array_key_exists($this->type, $lst)) {
            return $lst[$this->type];
        }
        return $this->type;
    }

    public static function getTypeNameByID($type)
    {
        $lst = self::getListType();
        if (array_key_exists($type, $lst)) {
            return $lst[$type];
        }
        return $type;
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'time', 'status', 'phone', 'created_at', 'updated_at', 'type', 'price'], 'integer'],
            [['name', 'address', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Tên đăng nhập',
            'name' => 'Họ tên',
            'address' => 'Địa chỉ',
            'time' => 'Thời gian nhận',
            'status' => 'Trạng thái',
            'note' => 'Ghi chú',
            'phone' => 'Số điện thoại',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày thay đổi thông tin',
            'type' => 'Type',
            'price' => 'Tổng tiền',
        ];
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
