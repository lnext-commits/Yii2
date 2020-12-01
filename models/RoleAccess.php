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
class RoleAccess extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{role_access}}';
    }

    public function beforeSave($insert)
    {
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}