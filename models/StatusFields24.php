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
 * @property string $title_ru
 * @property string $title_en
 */
class StatusFields24 extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%b24_status_list}}';
    }

    public function beforeSave($insert)
    {
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    static function getByCompanyType($type)
    {
        $ret = [];
        if ($b24_comp_field = CompanyFields24::findOne(['name' => $type])) {

            foreach (StatusFields24::findAll(['b24_comp_field_id' => $b24_comp_field->id]) as $k => $value){
                $ret[$k] = [
                    'entity_id'=> $type,
                    'id' => $value->id,
                    'name'=> $value->name,
                    'status_id'=> $value->status_id
                ];
            }
        }
        return $ret;
    }
}