<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbproduct".
 *
 * @property integer $product_id
 * @property string $product_partno
 * @property string $product_name
 * @property string $product_sellingPice
 * @property integer $product_stock
 * @property integer $product_categoryid
 * @property string $product_description
 * @property integer $product_reorderLevel
 * @property string $product_unitName
 * @property string $product_active
 * @property string $product_averageCost
 * @property integer $product_markupPercent
 * @property string $product_type
 *
 * @property Tbcategory $productCategory
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbproduct';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_partno', 'product_name', 'product_sellingPice', 'product_stock', 'product_categoryid', 'product_description', 'product_reorderLevel', 'product_unitName', 'product_averageCost', 'product_markupPercent', 'product_type'], 'required'],
            [['product_sellingPice', 'product_averageCost'], 'number'],
            [['product_stock', 'product_categoryid', 'product_reorderLevel', 'product_markupPercent'], 'integer'],
            [['product_description'], 'string'],
			[['product_supply_tax', 'product_purchase_tax'], 'string', 'max' => 10],
            [['product_partno'], 'string', 'max' => 15],
            [['product_name'], 'string', 'max' => 55],
            [['product_unitName'], 'string', 'max' => 6],
            [['product_active', 'product_type'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_partno' => 'Product Partno',
            'product_name' => 'Product Name',
            'product_sellingPice' => 'Product Selling Pice',
            'product_stock' => 'Product Stock',
            'product_categoryid' => 'Product Categoryid',
            'product_description' => 'Product Description',
            'product_reorderLevel' => 'Product Reorder Level',
            'product_unitName' => 'Product Unit Name',
            'product_active' => 'Product Active',
            'product_averageCost' => 'Product Average Cost',
            'product_markupPercent' => 'Product Markup Percent',
            'product_type' => 'Product Type',
			'product_supply_tax' => 'Product Supply Tax',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(Tbcategory::className(), ['category_id' => 'product_categoryid']);
    }
}
