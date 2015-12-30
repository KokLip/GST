<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbpurchaseorderdetail".
 *
 * @property integer $purchaseorderdetail_id
 * @property integer $purchaseorderdetail_purchaseorderid
 * @property integer $purchaseorderdetail_productid
 * @property string $purchaseorderdetail_partno
 * @property string $purchaseorderdetail_productname
 * @property integer $purchaseorderdetail_unit
 * @property string $purchaseorderdetail_unitname
 * @property string $purchaseorderdetail_price
 * @property integer $purchaseorderdetail_unitsent
 * @property string $purchaseorderdetail_status
 * @property string $purchaseorderdetail_tax_code
 * @property integer $purchaseorderdetail_tax_rate
 * @property string $purchaseorderdetail_tax_amount
 * @property string $purchaseorderdetail_total_amount
 * @property integer $purchaseorderdetail_gst_status
 *
 * @property Tbpurchaseorder $purchaseorderdetailPurchaseorder
 * @property Tbproduct $purchaseorderdetailProduct
 */
class PurchaseOrderDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbpurchaseorderdetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchaseorderdetail_purchaseorderid', 'purchaseorderdetail_productid', 'purchaseorderdetail_partno', 'purchaseorderdetail_productname', 'purchaseorderdetail_unit', 'purchaseorderdetail_unitname', 'purchaseorderdetail_price', 'purchaseorderdetail_unitsent', 'purchaseorderdetail_status', 'purchaseorderdetail_tax_code', 'purchaseorderdetail_tax_rate', 'purchaseorderdetail_tax_amount', 'purchaseorderdetail_total_amount', 'purchaseorderdetail_gst_status'], 'required'],
            [['purchaseorderdetail_purchaseorderid', 'purchaseorderdetail_productid', 'purchaseorderdetail_unit', 'purchaseorderdetail_unitsent', 'purchaseorderdetail_tax_rate', 'purchaseorderdetail_gst_status'], 'integer'],
            [['purchaseorderdetail_price', 'purchaseorderdetail_tax_amount', 'purchaseorderdetail_total_amount'], 'number'],
            [['purchaseorderdetail_partno', 'purchaseorderdetail_unitname'], 'string', 'max' => 15],
            [['purchaseorderdetail_productname'], 'string', 'max' => 55],
            [['purchaseorderdetail_status'], 'string', 'max' => 2],
            [['purchaseorderdetail_tax_code'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'purchaseorderdetail_id' => 'Purchaseorderdetail ID',
            'purchaseorderdetail_purchaseorderid' => 'Purchaseorderdetail Purchaseorderid',
            'purchaseorderdetail_productid' => 'Purchaseorderdetail Productid',
            'purchaseorderdetail_partno' => 'Purchaseorderdetail Partno',
            'purchaseorderdetail_productname' => 'Purchaseorderdetail Productname',
            'purchaseorderdetail_unit' => 'Purchaseorderdetail Unit',
            'purchaseorderdetail_unitname' => 'Purchaseorderdetail Unitname',
            'purchaseorderdetail_price' => 'Purchaseorderdetail Price',
            'purchaseorderdetail_unitsent' => 'Purchaseorderdetail Unitsent',
            'purchaseorderdetail_status' => 'Purchaseorderdetail Status',
            'purchaseorderdetail_tax_code' => 'Purchaseorderdetail Tax Code',
            'purchaseorderdetail_tax_rate' => 'Purchaseorderdetail Tax Rate',
            'purchaseorderdetail_tax_amount' => 'Purchaseorderdetail Tax Amount',
            'purchaseorderdetail_total_amount' => 'Purchaseorderdetail Total Amount',
            'purchaseorderdetail_gst_status' => 'Purchaseorderdetail Gst Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseorderdetailPurchaseorder()
    {
        return $this->hasOne(Tbpurchaseorder::className(), ['purchaseorder_id' => 'purchaseorderdetail_purchaseorderid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseorderdetailProduct()
    {
        return $this->hasOne(Tbproduct::className(), ['product_id' => 'purchaseorderdetail_productid']);
    }
}
