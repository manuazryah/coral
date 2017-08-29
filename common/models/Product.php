<?php

namespace common\models;

use Yii;
use yii\imagine\Image;
use Imagine\Image\Box;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $category
 * @property integer $subcategory
 * @property string $product_name
 * @property string $canonical_name
 * @property string $item_ean
 * @property string $brand
 * @property integer $gender_type
 * @property string $price
 * @property string $offer_price
 * @property integer $currency
 * @property integer $stock
 * @property integer $stock_unit
 * @property integer $tax
 * @property integer $free_shipping
 * @property string $product_type
 * @property integer $size
 * @property integer $size_unit
 * @property string $main_description
 * @property string $product_detail
 * @property integer $condition
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 * @property integer $status
 * @property string $profile
 */
class Product extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['category', 'subcategory', 'gender_type', 'currency', 'stock', 'stock_unit', 'tax', 'free_shipping', 'size', 'size_unit', 'condition', 'CB', 'UB', 'status'], 'integer'],
            [['category', 'subcategory', 'product_name', 'canonical_name', 'item_ean', 'brand', 'price', 'currency', 'stock', 'stock_unit', 'tax', 'product_type', 'product_detail', 'meta_title', 'gallery_alt', 'profile_alt'], 'required'],
//             [['profile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['price', 'offer_price'], 'number'],
            [['main_description', 'product_detail'], 'string'],
            [['DOC', 'DOU'], 'safe'],
            [['product_name', 'canonical_name'], 'string', 'max' => 100],
            [['item_ean', 'brand', 'product_type'], 'string', 'max' => 255],
            [['canonical_name'], 'unique'],
            [['item_ean'], 'unique'],
            [['other_image'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'subcategory' => 'Subcategory',
            'product_name' => 'Product Name',
            'canonical_name' => 'Canonical Name',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'search_tag' => 'Search Tag',
            'item_ean' => 'Item Ean',
            'brand' => 'Brand',
            'gender_type' => 'Gender Type',
            'price' => 'Price',
            'offer_price' => 'Offer Price',
            'currency' => 'Currency',
            'stock' => 'Stock',
            'stock_unit' => 'Stock Unit',
            'stock_availability' => 'Stock Availability',
            'tax' => 'Tax',
            'free_shipping' => 'Free Shipping',
            'product_type' => 'Product Type',
            'size' => 'Size',
            'size_unit' => 'Size Unit',
            'main_description' => 'Main Description',
            'product_detail' => 'Product Detail',
            'condition' => 'Condition',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
            'status' => 'Status',
            'profile' => 'Profile Picture',
            'other_image' => 'Other Images',
            'profile_alt' => 'Profile Alt',
            'gallery_alt' => 'Gallery Alt',
        ];
    }

    public function upload($file, $model) {
        if (\yii::$app->basePath . '/../uploads') {
            $path = yii::$app->basePath . '/../uploads/product/' . $model->id . '/profile/' . $model->canonical_name . '.' . $file->extension;

            Image::frame($path)
                    ->thumbnail(new Box(100, 100))
                    ->save(\yii::$app->basePath . '/../uploads/product/' . $model->id . '/profile/' . $model->canonical_name . '_thumb.' . $file->extension, ['quality' => 50]);
//            
            return true;
        }
    }

    public function uploadMultiple($file, $product_id, $canname, $i) {
        if (\yii::$app->basePath . '/../uploads') {
            chmod(\yii::$app->basePath . '/../uploads', 0777);

            if (!is_dir(\yii::$app->basePath . '/../uploads/product/')) {
                mkdir(\yii::$app->basePath . '/../uploads/product/');
                chmod(\yii::$app->basePath . '/../uploads/product/', 0777);
            }
            if (!is_dir(\yii::$app->basePath . '/../uploads/product/' . $product_id)) {
                mkdir(\yii::$app->basePath . '/../uploads/product/' . $product_id);
                chmod(\yii::$app->basePath . '/../uploads/product/' . $product_id, 0777);
            }
            $path = yii::$app->basePath . '/../uploads/product/' . $product_id;
            $name = $this->fileExists($path, $canname, $image_name = $canname, $file->extension, 1);
            if ($file->saveAs($path . '/' . $name)) {
                chmod($path . '/' . $name, 0777);
                if (!is_dir(\yii::$app->basePath . '/../uploads/product/' . $product_id. '/gallery_thumb/')) {
                    mkdir(\yii::$app->basePath . '/../uploads/product/' . $product_id . '/gallery_thumb/');
                    chmod(\yii::$app->basePath . '/../uploads/product/' . $product_id . '/gallery_thumb/', 0777);
                }
                Image::thumbnail($path . '/' . $name, 500, 300)
                        ->resize(new Box(500, 200))
                        ->save($path . '/gallery_thumb/' . $name, ['quality' => 70]);
            }
//            if ($file->saveAs(\yii::$app->basePath . '/../uploads/product/' . $product_id . '/' . $file->name . '.' . $file->extension))
//                chmod(\yii::$app->basePath . '/../uploads/product/' . $product_id . '/' . $file->name . '.' . $file->extension, 0777);
//            Image::thumbnail(\yii::$app->basePath . '/../uploads/product/' . $product_id . '/' . $file->name . '.' . $file->extension, 500, 300)
//                    ->resize(new Box(500, 200))
//                    ->save(\yii::$app->basePath . '/../uploads/product/' . $product_id . '/' . $file->name . '.' . $file->extension, ['quality' => 70]);
            return true;
        }
    }

    public function fileExists($path, $canname, $image_name, $extension, $sufix) {
        if (file_exists($path . '/' . $image_name . '.' . $extension)) {
            $image_name = basename($path . '/' . $canname . '_' . $sufix);
            return $this->fileExists($path, $canname, $image_name, $extension, $sufix + 1);
        } else {
            return $image_name . '.' . $extension;
        }
    }

}