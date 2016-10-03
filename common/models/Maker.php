<?php

namespace common\models;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 27/8/2016
 * Time: 5:00 PM
 */
class Maker
{
    public static function formatNumber($number)
    {
        return (new \yii\i18n\Formatter())->asInteger($number);
    }
}
?>