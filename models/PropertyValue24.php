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

class PropertyValue24 extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%b24_property_values}}';
    }

    public function beforeSave($insert)
    {
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function getBrandImage($id)
    {
        if ($brandImage = Images::find()->where(['relative_type' => 'brands', 'type' => 'brands', 'relative_id' => $id])->orderBy('id DESC')->one()) {
            return $brandImage->url;
        }
        return '';
    }

    public function getTypeImage($id)
    {
        if ($brandImage = Images::find()->where(['relative_type' => 'type_product', 'type' => 'type_product', 'relative_id' => $id])->orderBy('id DESC')->one()) {
            if (!empty($brandImage->url)) {
                return $brandImage->url;
            }
        }
        return '';
    }
}