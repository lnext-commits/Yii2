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
class DealsBlock24 extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%b24_deals_block}}';
    }


}