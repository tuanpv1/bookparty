<?php
namespace frontend\models;

use common\helpers\ForumHelper;
use common\models\User;
use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class FormBook extends Model
{
    public $name;
    public $phone;
    public $address;
    public $time;
    public $id_food;
    public $id_package;
    public $price;
    public $number;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['address','required','message'=>'Địa chỉ không được để trống'],
            ['phone','required','message'=>'Số điện thoại không được để trống'],
            ['number','required','message'=>'Số lượng không được để trống'],
            ['price','required','message'=>'Giá không được để trống'],
            ['id_package','required','message'=>'Loại gói tiệc không được để trống'],
            ['id_food','required','message'=>'Món ăn không được để trống'],
            [['address','name'], 'safe'],
            [['id_food','id_package','price'],'integer'],
            [['phone'], 'integer', 'message' => 'Số điện thoại phải là kiểu số'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Họ Tên',
            'phone' => 'Số điện thoại',
            'email' => 'Email',
            'address' => 'Địa chỉ',
            'time' => 'Thời gian nhận',
            'price' => 'Giá tiền',
            'number' =>'Số lượng',
            'id_food' => 'Tên món ăn',
            'id_package' => 'Tên gói'
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->address = $this->address;
        $user->phone = $this->phone_number;
        $user->birthday = $this->birthday;
        $user->password_reset_token = $this->password;
        $user->type = User::TYPE_USER;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;

    }
}
