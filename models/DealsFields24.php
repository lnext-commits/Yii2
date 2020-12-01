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

class DealsFields24 extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%b24_deals_fields}}';
    }

    public function beforeSave($insert)
    {
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    static function updateDealsFields(){
        $catalog = CRest::call('crm.deal.fields');
        foreach ($catalog['result'] as $k => $value){
            if(!$fields = self::findOne(['name'=> $k, 'title'=> $value['title']])){
                $fields = new self();
                $fields->name = $k;
            }
            $fields->title = $value['title'];
            $fields->type = $value['type'];
            if(isset($value['listLabel'])){
                $fields->listLabel = $value['listLabel'];
            }
            $items = null;
            if(key_exists('items', $value) && is_array($value['items'])){
                $items = $value['items'];
            }
            $fields->field_id ? $fields->save() :  $fields->save();
            if($items){
                foreach ($items as $item){
                    if(!$fieldsValue = DealsFieldsItem24::find()->where(['id'=> $item['ID'] , 'fields_id'=>$fields->field_id])->one()){
                        $fieldsValue = new DealsFieldsItem24();
                        $fieldsValue->fields_id = $fields->field_id;
                        $fieldsValue->id = $item['ID'];
                        $fieldsValue->value = $item['VALUE'];
                        $fieldsValue->save();
                    }else{
                        $fieldsValue->id = $item['ID'];
                        $fieldsValue->value = $item['VALUE'];
                        $fieldsValue->update();
                    }
                }
            }
        }
    }


}