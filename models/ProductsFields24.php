<?php

namespace models;

use bitrix\components\CRest;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Products model
 *
 * @property integer $id
 */

class ProductsFields24 extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%b24_product_fields}}';
    }

    public function beforeSave($insert)
    {
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    static function updateProductsFields(){
        $catalog = CRest::call('crm.product.fields');
        foreach ($catalog['result'] as $k => $value){
            if(!$fields = self::findOne(['name'=> $k, 'title'=> $value['title']])){
                $fields = new ProductsFields24();
                $fields->name = $k;
            }
            $fields->title = $value['title'];
            $fields->type = $value['type'];
            if(isset($value['listLabel'])){
                $fields->listLabel = $value['listLabel'];
            }
            $items = null;
            if(key_exists('values', $value) && is_array($value['values'])){
                $items = $value['values'];
            }
            $fields->field_id ? $fields->save() :  $fields->save();
            if($items){
                foreach ($items as $item){
                    if(!$fieldsValue = ProductsFieldsItem24::find()->where(['id'=> $item['ID'] , 'fields_id'=>$fields->field_id])->one()){
                        $fieldsValue = new ProductsFieldsItem24();
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