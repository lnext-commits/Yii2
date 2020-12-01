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
class SpendingType extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ttl_spending_type}}';
    }

    public function beforeSave($insert)
    {
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}