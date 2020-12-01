<?php

namespace models;

use bitrix\components\CRest;
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

class Property24 extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%b24_property}}';
    }

    public function beforeSave($insert)
    {
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function getPropertiesFromB24(){

        $deal = CRest::call('crm.product.property.get', [
            'id' => $this->id,
        ]);

        if ($deal && isset($deal['result']))
            return $deal['result'];

        return null;
    }

    public function updatePropertiesFromB24($values){
        $deal = CRest::call('crm.product.property.update', [
            'id' => $this->id,
            'fields' => $values
        ]);

        if ($deal && isset($deal['result']))
            return $deal['result'];

        return null;
    }
}