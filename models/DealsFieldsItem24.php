<?php

namespace models;

use bitrix\components\CRest;
use Yii;
use yii\db\ActiveRecord;

/**
 * Products model
 *
 * @property integer $id
 */

class DealsFieldsItem24 extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%b24_deals_fields_item}}';
    }

    public static function getAllTypeById($id)
    {
        $ret = [];
        foreach(self::findAll(['fields_id' => $id]) as $k => $pay) {
            $ret[$k]=[
                'id' => $pay->item_id,
                'value' => $pay->value
            ];
        }
        return $ret;
    }

    public function beforeSave($insert)
    {
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

}