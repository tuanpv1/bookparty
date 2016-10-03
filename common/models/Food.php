<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Url;

/**
 * This is the model class for table "food".
 *
 * @property integer $id
 * @property string $image
 * @property string $name
 * @property string $des
 * @property integer $price
 * @property integer $sale
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Food extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 10; // hien
    const STATUS_BLOCK = 1; //an
    public  function  getListStatus(){
        $list1 = [
            self::STATUS_ACTIVE => 'Hiện',
            self::STATUS_BLOCK => 'Ẩn',
        ];

        return $list1;
    }

    public function getStatusName()
    {
        $lst = self::getListStatus();
        if (array_key_exists($this->status, $lst)) {
            return $lst[$this->status];
        }
        return $this->status;
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'food';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['des'], 'string'],
            [['price', 'sale', 'status', 'created_at', 'updated_at'], 'integer'],
            [['image', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Hình ảnh',
            'name' => 'Tên món',
            'des' => 'Mô tả',
            'price' => 'Giá',
            'sale' => 'Giảm giá',
            'status' => 'Trạng thái',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày thay đổi thông tin',
        ];
    }

    public function getImageLink()
    {
        $pathLink = Yii::getAlias('@web') . '/' . Yii::getAlias('@image_food') . '/';
        $filename = null;

        if ($this->image) {
            $filename = $this->image;

        }
        if ($filename == null) {
            $pathLink = Yii::getAlias("@web/img/");
            $filename = 'bg_df.png';
        }

        return Url::to($pathLink . $filename, true);
    }
}
