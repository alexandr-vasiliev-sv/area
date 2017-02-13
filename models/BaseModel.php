<?php

namespace app\models;

use yii\helpers\ArrayHelper;

abstract class BaseModel extends \yii\db\ActiveRecord
{
    public static function lists($value, $key = null)
    {
        $selectArray = [$value];

        if ($key !== null) {
            $selectArray[] = $key;
        }
        $data = static::find()->select($selectArray)->orderBy('id')->all();
        if ($key !== null) { // return associative array
            return ArrayHelper::map($data, $key, $value);
        }
        // return index array with values @see $value
        $responseArray = [];
        foreach ($data as $item) {
            $responseArray[] = $item->{$value};
        }
        return $responseArray;
    }
}