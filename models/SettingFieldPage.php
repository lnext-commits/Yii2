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
class SettingFieldPage extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{setting_field_pages}}';
    }

    public function beforeSave($insert)
    {
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}