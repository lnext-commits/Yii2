<?php

namespace models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
/**
 * Products model
 *
 * @property integer $id
 * @property integer $property_id
 * @property string $title_ru
 * @property string $title_en
 */

class SubProperty extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sub_property}}';
    }

    public function beforeSave($insert)
    {
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}