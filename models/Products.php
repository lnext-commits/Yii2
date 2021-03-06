<?php

namespace models;

use bitrix\components\CRest;
use backend\components\UploadImage;
use models\ttl\TTlMajority;
use phpDocumentor\Reflection\Types\This;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Products model
 *
 * @property integer $product_id
 * @property string $title_ru
 */
class Products extends ActiveRecord
{
    //private $name;
    public $title_ru;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%products}}';
    }

    public function beforeSave($insert)
    {
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function getLogo()
    {
        if ($img = Images::find()->where(['relative_type' => 'product', 'type' => 'image', 'relative_id' => $this->product_id])->orderBy('id DESC')->one()) {
            return $img->url;
        }
        return '';
    }

    public function getUrl(){
        if ($status = ProductStatus::findOne(['product_id' => $this->product_id])) {
           return $status->url;
        }
        return $this->product_id;
    }

    static public function getNotTransliteProp($id , $lang){
        return ProductsProperty::find()
            ->from('products_property pp')
            ->innerJoin('property p', "p.id = pp.property_id")
            ->where("pp.value_{$lang} IS NULL AND pp.product_id={$id}")
            ->limit(1)
            ->count();
    }

    static public function getNotTransliteSubProp($id , $lang){
        return ProductsProperty::find()
            ->from('products_property pp')
            ->innerJoin('sub_property p', "p.id = pp.property_id")
            ->where("pp.value_{$lang} IS NULL AND pp.product_id={$id}")
            ->limit(1)
            ->count();
    }

    static public function getNotTransliteBarcode($id){
        return Images::find()
            ->where(['relative_id' => $id, 'relative_type'=>"product", 'type'=>"packages" ,'update'=>1])
            ->count();
    }

    static public function getAllTranslate($id, $lang){
        return self::getNotTransliteProp($id,$lang) + self::getNotTransliteSubProp($id,$lang) + self::getNotTransliteBarcode($id);
    }

    static public function loadProductEntryFromB24(int $productId)
    {
        $product = CRest::call('crm.product.get', [
            'id' => $productId,
        ]);

        if ($product && isset($product['result']))
            return $product['result'];

        return null;
    }

    static public function loadProducstDeals4(int $productId)
    {
        $product = CRest::call('crm.product.get', [
            'id' => $productId,
        ]);

        if ($product && isset($product['result']))
            return $product['result'];

        return null;
    }

    public function updateB24ProdProperty(){
        $product = CRest::call('crm.product.get', [
            'id' => $this->product_id,
        ]);
        foreach ($product['result'] as $k => $value){
            $key = strtolower($k);
            if($prop = strstr($key, 'property')){
                $p = explode('_',$prop)[1];
                if(!$b24pv = ProductsProperty24::findOne(['product_id'=> $this->product_id , 'property_id'=> $p])){
                    $b24pv = new ProductsProperty24();
                    $b24pv->product_id = $this->product_id;
                }
                if(is_array($value)) {
                    $b24pv->value = $value['value'];
                    $b24pv->value_id = $value['valueId'];
                }
                $b24pv->property_id = $p;
                !$b24pv->id ? $b24pv->save() : $b24pv->update();

            }
        }
    }


    static function updateB24Property()
    {
        $catalog = CRest::call('crm.product.property.list');
        foreach ($catalog['result'] as $k => $v) {
            if (!$b24pro = Property24::findOne($v['ID'])) {
                $b24pro = new Property24();
            }
            $val = null;
            foreach ($v as $t => $item) {
                $key = strtolower($t);
                $prop = ['id','iblock_id', 'name', 'sort', 'default_value', 'property_type', 'row_count', 'col_count', 'multiple', 'is_requred'];
                if (in_array($key, $prop)) {
                    $b24pro->$key = $item;
                } elseif ($t == 'VALUES') {
                    $val = $v['VALUES'];
                }
            }
            $b24pro->save();
            if (is_array($val)) {
                foreach ($val as $tv => $vp) {
                    if (!$b24proVal = PropertyValue24::findOne(['id' => $vp['ID'], 'b24property_id' => $b24pro->id])) {
                        $b24proVal = new PropertyValue24();
                        $b24proVal->b24property_id = $b24pro->id;
                    }
                    $b24proVal->id = $vp['ID'];
                    $b24proVal->value = $vp['VALUE'];
                    $b24proVal->save();
                }
            }
        }
    }

    public function loadFromB24($b24Product)
    {
        try {
            foreach ($this->prepareProductEntity($b24Product) as $k => $value) {
                if (strstr($k, 'property')) {

                }else{
                    $this->$k = $value;
                }
            }

        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public function afterSave($insert, $changedAttributes)
    {
        if (!$status = ProductStatus::findOne(['product_id' => $this->product_id])) {
            $status = new ProductStatus();
            $status->product_id = $this->product_id;
        }
        if($this->name) {
            $status->title_ru = $this->name;
            $status->save();
        }

        if ($b24prop = ProductsProperty24::findOne(['product_id' => $this->product_id, 'property_id' => 74])) {
            self::setInfoFromListex(self::getListexInfo($b24prop->value, $this->product_id));
        }
        if ($b24prop = ProductsProperty24::findOne(['product_id' => $this->product_id, 'property_id' => 70])) {
            $status->title_ru = $b24prop->value;
            $status->url = self::cyrillicToLatin(strtolower($b24prop->value), true);
            $status->save();
        }
        if($this->section_id) {
            $b24Catalog = Category24::loadCatalogEntryFromB24($this->section_id);
            if ($b24Catalog) {
                if (!$cat = Category24::findOne($b24Catalog['ID'])) {
                    $cat = new Category24();
                }
                $cat->id = $b24Catalog['ID'];
                $cat->name_ru = $b24Catalog['NAME'];
                $cat->catalog_id = $b24Catalog['CATALOG_ID'];
                $cat->section_id = $b24Catalog['SECTION_ID'] ? $b24Catalog['SECTION_ID'] : 0;
                $cat->save();
                if(!$majority = TTlMajority::findOne(['type'=> 'catalog', 'type_id'=> $this->section_id])){
                    $majority = new TTlMajority();
                    $majority->company_id = 0;
                    $majority->type= 'catalog';
                    $majority->type_id = $this->section_id;
                    if($majority->save()){
                        foreach (TTlMajority::find()->select(['distinct(company_id)'])->where('company_id!=0')->all() as $k => $m){
                            $major = new TTlMajority();
                            $major->company_id = $m->company_id;
                            $major->type= 'catalog';
                            $major->type_id = $this->section_id;
                            $major->save();
                        }
                    }
                }

            }
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    static public function getListexInfo($barcode, $id)
    {
        $post = "barcode={$barcode}&id={$id}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://bots2.logisctic.com:8080/api/barcode/');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $response = curl_exec($ch);

        curl_close($ch);

        return json_decode($response, true);
    }

    private function setInfoFromListex($reqv)
    {
        if (key_exists('result', $reqv) && $reqv['result']) {
            $dir = '/images/products/' . $this->product_id . '/';
            if (!is_dir($_SERVER['DOCUMENT_ROOT'] . $dir)) {
                mkdir($_SERVER['DOCUMENT_ROOT'] . $dir);
            }
            if (is_array($reqv['product']['images'])) {

                foreach (Images::findAll(['relative_type' => 'product',
                    'relative_id' => $this->product_id, 'type' => 'image']) as $im) {
                    $im->delete();
                }

                foreach ($reqv['product']['images'] as $img) {
                    $imageData = base64_encode(@file_get_contents($img));
                    if ($imgs = UploadImage::save_image('data: ' .
                        $this->get_image_mime_type($img) .
                        ';base64,' . $imageData, 'image_' . strtotime('now'),
                        $_SERVER['DOCUMENT_ROOT'] . $dir)) {
                        $prodImage = new Images();
                        $prodImage->relative_type = 'product';
                        $prodImage->relative_id = $this->product_id;
                        $prodImage->type = 'image';
                        $prodImage->url = $dir . $imgs;
                        $prodImage->save();
                    }
                    //print_r($imgs);
                }
            }

            if (is_array($reqv['product']['barcodeImages'])) {
                foreach (Images::findAll(['relative_type' => 'product',
                    'relative_id' => $this->product_id, 'type' => 'barcode']) as $im) {
                    $im->delete();
                }
                foreach ($reqv['product']['barcodeImages'] as $img) {
                    $imageData = base64_encode(@file_get_contents($img));
                    if ($imgs = UploadImage::save_image('data: ' .
                        $this->get_image_mime_type($img) .
                        ';base64,' . $imageData, 'barcode_' . strtotime('now'),
                        $_SERVER['DOCUMENT_ROOT'] . $dir)) {
                        $prodImage = new Images();
                        $prodImage->relative_type = 'product';
                        $prodImage->relative_id = $this->product_id;
                        $prodImage->type = 'barcode';
                        $prodImage->url = $dir . $imgs;
                        $prodImage->save();
                    }
                    //print_r($imgs);
                }
            }

            if (is_array($reqv['product']['packages'])) {
                foreach (Images::findAll(['relative_type' => 'product',
                    'relative_id' => $this->product_id, 'type' => 'packages']) as $im) {
                    $im->delete();
                }
                foreach ($reqv['product']['packages'] as $img) {
                    $imageData = base64_encode(@file_get_contents($img['image']));
                    if ($imgs = UploadImage::save_image('data: ' .
                        $this->get_image_mime_type($img['image']) .
                        ';base64,' . $imageData, 'packages_' . strtotime('now'),
                        $_SERVER['DOCUMENT_ROOT'] . $dir)) {
                        $prodImage = new Images();
                        $prodImage->relative_type = 'product';
                        $prodImage->relative_id = $this->product_id;
                        $prodImage->type = 'packages';
                        $prodImage->description = html_entity_decode($img['description']);
                        $prodImage->url = $dir . $imgs;
                        $prodImage->barcode = $img['number'];
                        $prodImage->save();
                    }
                    //print_r($imgs);
                }
            }

            foreach ($reqv['product'] as $k => $value) {
                if ($k != 'id' && $k != 'title' && $k != 'images' && $k != 'barcodeImages' && $k != 'packages' && $k != 'category') {
                    if (!$property = Property::findOne(['title_ru' => $k])) {
                        $property = new Property();
                    }
                    $property->title_ru = $k;
                    $property->save();
                    if (is_array($value)) {
                        foreach ($value as $v => $val) {
                            if(is_array($val)){
                                if (!$sproperty = Property::findOne(['title_ru' => $v])) {
                                    $sproperty = new Property();
                                }
                                $sproperty->title_ru = $v;
                                $sproperty->save();
                                foreach ($val as $subt => $it){
                                    if (!$sub = SubProperty::findOne([
                                        'title_ru' => $subt])) {
                                        $sub = new SubProperty();
                                    }
                                    $sub->title_ru = $subt;
                                    $sub->save();
                                    if (!$prodProperty = ProductsProperty::findOne([
                                        'product_id' => $this->product_id,
                                        'property_id' => $sproperty->id,
                                        'sub_property_id' => $sub->id
                                    ])) {
                                        $prodProperty = new ProductsProperty();
                                        $prodProperty->product_id = $this->product_id;
                                        $prodProperty->property_id = $sproperty->id;
                                        $prodProperty->sub_property_id = $sub->id;
                                    }
                                    $prodProperty->value_ru = $it;
                                    $prodProperty->save();
                                }
                            }elseif($v != '') {
                                if (!$sub = SubProperty::findOne([
                                    'title_ru' => $v])) {
                                    $sub = new SubProperty();
                                }
                                $sub->title_ru = $v;
                                $sub->save();
                                if (!$prodProperty = ProductsProperty::findOne([
                                    'product_id' => $this->product_id,
                                    'property_id' => $property->id,
                                    'sub_property_id' => $sub->id
                                ])) {
                                    $prodProperty = new ProductsProperty();
                                    $prodProperty->product_id = $this->product_id;
                                    $prodProperty->property_id = $property->id;
                                    $prodProperty->sub_property_id = $sub->id;
                                }
                                $prodProperty->value_ru = $val;
                                $prodProperty->save();
                            }
                        }
                    }
                }
                if($k == 'category'){
                    if(!$b24prop = PropertyValue24::findOne(['value'=>$value])){
                        $b24prop = new PropertyValue24();
                    }
                    $b24prop->b24property_id = 108;
                    $b24prop->value = $value;
                    $b24prop->save();
                    if(!$b24prodProp = ProductsProperty24::findOne([
                        'product_id'=>$this->product_id,
                        'property_id' => 108,
                        'value' => $b24prop->id
                        ])){
                        $b24prodProp = new ProductsProperty24();
                    }
                    $b24prodProp->product_id=$this->product_id;
                    $b24prodProp->property_id = 108;
                    $b24prodProp->value = $b24prop->id;
                    $b24prodProp->save();
                    if ($prop = Property24::findOne($b24prodProp->property_id)) {
                        $b24Deal = $prop->getPropertiesFromB24();
                        $values = $b24Deal['VALUES'];
                        foreach (PropertyValue24::findAll(['b24property_id' => $b24prodProp->property_id]) as $property) {
                            $values[$property->id] = [
                                "ID" => $property->id,
                                "VALUE" => $property->value,
                                "SORT" => 500,
                                "DEF" => "N"
                            ];
                        }
                        $prop->updatePropertiesFromB24(['VALUES' => $values]);
                    }
                }
            }
        };
    }

    /**
     * @param array $product
     * @return array
     */

    private function prepareProductEntity(array $product): array
    {

        return [
            'product_id' => intval($product['ID']),
            'name' => $product['NAME'],
            'active' => $product['ACTIVE'],
            'catalog_id' => intval($product['CATALOG_ID']),
            'created_by' => $product['CREATED_BY'],
            'currency_id' => $product['CURRENCY_ID'],
            'date_create' => $product['DATE_CREATE'],
            'description' => $product['DESCRIPTION'],
            'description_type' => $product['DESCRIPTION_TYPE'],
            'detail_picture' => $product['DETAIL_PICTURE'],
            'measure' => $product['MEASURE'],
            'modified_by' => $product['MODIFIED_BY'],
            'preview_picture' => $product['PREVIEW_PICTURE'],
            'price' => $product['PRICE'],
            'section_id' => $product['SECTION_ID'],
            'sort' => $product['SORT'],
            'timestamp_x' => $product['TIMESTAMP_X'],
            'vat_id' => $product['VAT_ID'],
            'vat_included' => $product['VAT_INCLUDED'],
            'xml_id' => $product['XML_ID'],
        ];
    }

    private function get_image_mime_type($image_path)
    {
        $mimes = array(
            IMAGETYPE_GIF => "image/gif",
            IMAGETYPE_JPEG => "image/jpg",
            IMAGETYPE_PNG => "image/png",
            IMAGETYPE_SWF => "image/swf",
            IMAGETYPE_PSD => "image/psd",
            IMAGETYPE_BMP => "image/bmp",
            IMAGETYPE_TIFF_II => "image/tiff",
            IMAGETYPE_TIFF_MM => "image/tiff",
            IMAGETYPE_JPC => "image/jpc",
            IMAGETYPE_JP2 => "image/jp2",
            IMAGETYPE_JPX => "image/jpx",
            IMAGETYPE_JB2 => "image/jb2",
            IMAGETYPE_SWC => "image/swc",
            IMAGETYPE_IFF => "image/iff",
            IMAGETYPE_WBMP => "image/wbmp",
            IMAGETYPE_XBM => "image/xbm",
            IMAGETYPE_ICO => "image/ico");

        if (($image_type = exif_imagetype($image_path))
            && (array_key_exists($image_type, $mimes))) {
            return $mimes[$image_type];
        } else {
            return FALSE;
        }
    }

    static public function cyrillicToLatin($text, $toLowCase)
    {
        $dictionary = array(
            'й' => 'i',
            'ц' => 'c',
            'у' => 'u',
            'к' => 'k',
            'е' => 'e',
            'н' => 'n',
            'г' => 'g',
            'ш' => 'sh',
            'щ' => 'shch',
            'з' => 'z',
            'х' => 'h',
            'ъ' => '',
            'ф' => 'f',
            'ы' => 'y',
            'в' => 'v',
            'а' => 'a',
            'п' => 'p',
            'р' => 'r',
            'о' => 'o',
            'л' => 'l',
            'д' => 'd',
            'ж' => 'zh',
            'э' => 'e',
            'ё' => 'e',
            'я' => 'ya',
            'ч' => 'ch',
            'с' => 's',
            'м' => 'm',
            'и' => 'i',
            'т' => 't',
            'ь' => '',
            'б' => 'b',
            'ю' => 'yu',

            'Й' => 'I',
            'Ц' => 'C',
            'У' => 'U',
            'К' => 'K',
            'Е' => 'E',
            'Н' => 'N',
            'Г' => 'G',
            'Ш' => 'SH',
            'Щ' => 'SHCH',
            'З' => 'Z',
            'Х' => 'X',
            'Ъ' => '',
            'Ф' => 'F',
            'Ы' => 'Y',
            'В' => 'V',
            'А' => 'A',
            'П' => 'P',
            'Р' => 'R',
            'О' => 'O',
            'Л' => 'L',
            'Д' => 'D',
            'Ж' => 'ZH',
            'Э' => 'E',
            'Ё' => 'E',
            'Я' => 'YA',
            'Ч' => 'CH',
            'С' => 'S',
            'М' => 'M',
            'И' => 'I',
            'Т' => 'T',
            'Ь' => '',
            'Б' => 'B',
            'Ю' => 'YU',

            '\-' => '-',
            '\s' => '-',

            '[^a-zA-Z0-9\-\_\.]' => '',

            '[-]{2,}' => '-',
        );

        foreach ($dictionary as $from => $to) {
            $text = mb_ereg_replace($from, $to, $text);
        }
        if ($toLowCase) {
            $text = mb_strtolower($text, Yii::$app->charset);
        }

        return trim($text, '-');
    }
}