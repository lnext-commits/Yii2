<?php

namespace landing\models;

use models\Product24;
use models\Products;
use models\PropertyValue24;
use models\TypeGroup;
use models\TypeValue;


/**
 * Product model
 *
 * @property integer $id
 * @property string $title_ru
 */
class TypeGroupLanding extends TypeGroup
{
    static public function getCheckboxAll($id)
    {
        $fieldId = 0;
        if ($id == 107) $fieldId = 43;
        if ($id == 108) $fieldId = 44;
        $model = PropertyValue24::find()->where(['b24property_id' => $id])->all();
        $Filter = [];
        foreach ($model as $m) {
            $Products = Product24::find()->where(['value' => $m->id, 'field_id' => $fieldId])->all();
            foreach ($Products as $item) {
                if (Products::find()->where(['product_id' => $item->product_id, 'products.active' => 'Y'])->andWhere('products.price > 0')->all()) {
                    $Filter [$m->id] = $m;
                }
            }


        }
        return $Filter;
    }

    static public function getCheckboxSet(int $idField1, int $idField2, array $b24pValue)
    {
        $products = Products::find()
            ->select(['products.*', 'ps.title_ru'])
            ->innerJoin('products_status ps', 'ps.product_id=products.product_id')
            ->innerJoin('b24_products b24p', 'b24p.product_id=products.product_id')
            ->where(['b24p.field_id' => $idField1, 'b24p.value' => $b24pValue, 'products.active' => 'Y'])
            ->andWhere('products.price > 0')
            ->all();
        $Filter = [];
        foreach ($products as $product) {
            $type = Product24::findOne(['product_id' => $product->product_id, 'field_id' => $idField2]);
            if ($type->value) {
                $Filter [$product->product_id] = $type->value;
            }
        }
        if ($Filter) {
            return PropertyValue24::find()
                ->where(['id' => $Filter])
                ->all();
        } else {
            return $Filter;
        }
    }

    static public function getTypesMain()
    {
        $mainType = [];
        $allMain = TypeValue::find()
            ->where(['parent_id' => 0])
            ->asArray()
            ->all();

        foreach ($allMain as $key => $main) {

            if ((new TypeGroupLanding)->checkIset($main) || (new TypeGroupLanding)->checkIsetSub($main)) {//
                $mainType[$key] = $main;
            }
        }
        return $mainType;
    }

    private function checkIset($main)
    {

        $result = false;
        $types = TypeGroup::find()
            ->select(['id_property_values'])
            ->where(['belonging' => $main['id']])
            ->asArray()
            ->all();
        if ($types) {
            foreach ($types as $id) {
                if (Products::find()
                    ->select(['products.*', 'ps.title_ru'])
                    ->innerJoin('products_status ps', 'ps.product_id=products.product_id')
                    ->innerJoin('b24_products b24p', 'b24p.product_id=products.product_id')
                    ->where(['b24p.field_id' => 44, 'b24p.value' => $id['id_property_values'], 'products.active' => 'Y'])
                    ->andWhere('products.price > 0')
                    ->all()) {
                    $result = true;
                }


            }
        }
        return $result;
    }

    private function checkIsetSub($sub)
    {
        $result = false;
        $groups = TypeValue::find()
            ->where(['parent_id' => $sub['id']])
            ->asArray()
            ->all();
        if ($groups) {
            foreach ($groups as $k => $group) {
                if ($this->checkIset($group))
                    $result = true;
            }
        }
        return $result;
    }

    static public function getTypesSub($typesMain)
    {
        $typesSub = [];

        foreach ($typesMain as $typeMain) {

            $carrierSub = TypeValue::find()
                ->where(['parent_id' => $typeMain['id']])
                ->asArray()
                ->all();
            $carrierType = TypeGroup::find()
                ->select(['type_product_group.*', 'pv.value'])
                ->leftJoin('b24_property_values pv', 'pv.id=type_product_group.id_property_values')
                ->where(['belonging' => $typeMain['id']])
                ->asArray()
                ->all();

            if ($carrierSub) {
                foreach ($carrierSub as $sub) {
                    if ((new TypeGroupLanding)->checkIset($sub)) {
                        $typesSub [$typeMain['id']]['sub'] = [$sub];
                    }
                }
            }
            if ($carrierType) {

                foreach ($carrierType as $type) {
                    if (Products::find()
                        ->select(['products.*', 'ps.title_ru'])
                        ->innerJoin('products_status ps', 'ps.product_id=products.product_id')
                        ->innerJoin('b24_products b24p', 'b24p.product_id=products.product_id')
                        ->where(['b24p.field_id' => 44, 'b24p.value' => $type['id_property_values'], 'products.active' => 'Y'])
                        ->andWhere('products.price > 0')
                        ->all()) {
                        $typesSub [$typeMain['id']]['type'] = [$type];
                    }
                }

            }

        }

        return $typesSub;
    }

    static public function getTypes($typesSub)
    {
        $types = [];

        foreach ($typesSub as $typeG) {

            foreach ($typeG as $k => $typeST) {

                if ($k == 'sub') {
                    foreach ($typeST as $type) {
                        $typeZ = TypeGroup::find()
                            ->select(['type_product_group.*', 'pv.value'])
                            ->leftJoin('b24_property_values pv', 'pv.id=type_product_group.id_property_values')
                            ->where(['belonging' => $type['id']])
                            ->asArray()
                            ->all();
                        if ($typeZ) {

                            foreach ($typeZ as $t1) {
                                if (Products::find()
                                    ->select(['products.*', 'ps.title_ru'])
                                    ->innerJoin('products_status ps', 'ps.product_id=products.product_id')
                                    ->innerJoin('b24_products b24p', 'b24p.product_id=products.product_id')
                                    ->where(['b24p.field_id' => 44, 'b24p.value' => $t1['id_property_values'], 'products.active' => 'Y'])
                                    ->andWhere('products.price > 0')
                                    ->all()) {
                                    $types [$type['id']]['type'] = [$t1];
                                }
                            }
                            foreach ($typeZ as $t) {
                                $productType = Product24::find()->where(['field_id' => 44, 'value' => $t['id_property_values']])->asArray()->all();
                                foreach ($productType as $pod) {
                                    $v = Product24::findOne(['product_id' => $pod['product_id'], 'field_id' => 43]);
                                    if ($v->value) {
                                        $pv = PropertyValue24::findOne($v->value);
                                        $types [$type['id']]['brand'][$v->value] = $pv->value;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $types;
    }
}