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
class DealsStatus24 extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%b24_deals_status}}';
    }

    public static function getStatus($value)
    {
            if($status = self::find()->where(['type_id' => $value])->andWhere('entry_status like "DEAL_STAGE%"')->one()){
                return $status->status;
            }

        return (self::findOne(['type_id' => 'C0:NEW']))->status;
    }


    public static function getStatusById($value)
    {
            if($status = self::findOne(['type_id' => $value])){
                return $status->status;
            }

        return (self::findOne(['type_id' => 'C0:NEW']))->status;
    }

    public function beforeSave($insert)
    {
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    static public function updateStatus(){
        $catalog = CRest::call('crm.status.list');
        foreach ($catalog['result'] as $k => $value){
            if(!$fields = self::findOne(['type_id'=> $value['STATUS_ID'] , 'id'=> $value['ID']])){
                $fields = new self();
                $fields->id = $value['ID'];
                $fields->status = $value['NAME'];
                $fields->type_id = $value['STATUS_ID'];
                $fields->entry_status = $value['ENTITY_ID'];
                $fields->save();
            }else{
                $fields->status = $value['NAME'];
                $fields->entry_status = $value['ENTITY_ID'];
                $fields->type_id = $value['STATUS_ID'];
                $fields->update(false);
            }

        }
    }
}