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
 * @property string $tytle_ru
 */

class Images extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%images}}';
    }

    public function beforeSave($insert)
    {
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function afterDelete()
    {
        if(file_exists($_SERVER['DOCUMENT_ROOT']  . $this->url)){
            unlink($_SERVER['DOCUMENT_ROOT']  . $this->url);
        }
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }
}