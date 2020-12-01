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

class DealContactFields24 extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%b24_dealy_contact_fields}}';
    }

    public function beforeSave($insert)
    {
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    static public function loadDealContactFieldsItemsFromB24()
    {
        $dealCFields = CRest::call('crm.deal.contact.fields');

        if ($dealCFields && isset($dealCFields['result'])) {
            foreach ($dealCFields['result'] as $k => $field) {
                if (!$cfield = self::findOne(['name' => $k])) {
                    $cfield = new self();
                }
                $cfield->name = $k;
                $cfield->title = $field['title'];
                $cfield->save();
            }
        }
        return $dealCFields;
    }

}