<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbquotationdetail".
 *
 * @property integer $quotationdetail_id
 * @property integer $quotationdetail_quotationid
 * @property integer $quotationdetail_productid
 * @property string $quotationdetail_partno
 * @property string $quotationdetail_productname
 * @property integer $quotationdetail_unit
 * @property string $quotationdetail_unitname
 * @property string $quotationdetail_price
 * @property string $quotationdetail_tax_code
 * @property integer $quotationdetail_tax_rate
 * @property string $quotationdetail_tax_amount
 * @property integer $quotationdetail_gst_status
 *
 * @property Tbquotation $quotationdetailQuotation
 * @property Tbproduct $quotationdetailProduct
 */
class QuotationDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbquotationdetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quotationdetail_quotationid', 'quotationdetail_productid', 'quotationdetail_partno', 'quotationdetail_productname', 'quotationdetail_unit', 'quotationdetail_unitname', 'quotationdetail_price', 'quotationdetail_tax_code', 'quotationdetail_tax_rate', 'quotationdetail_tax_amount', 'quotationdetail_gst_status'], 'required'],
            [['quotationdetail_quotationid', 'quotationdetail_productid', 'quotationdetail_unit', 'quotationdetail_tax_rate', 'quotationdetail_gst_status'], 'integer'],
            [['quotationdetail_price', 'quotationdetail_tax_amount'], 'number'],
            [['quotationdetail_partno', 'quotationdetail_unitname'], 'string', 'max' => 15],
            [['quotationdetail_productname'], 'string', 'max' => 55],
            [['quotationdetail_tax_code'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'quotationdetail_id' => 'Quotationdetail ID',
            'quotationdetail_quotationid' => 'Quotationdetail Quotationid',
            'quotationdetail_productid' => 'Quotationdetail Productid',
            'quotationdetail_partno' => 'Quotationdetail Partno',
            'quotationdetail_productname' => 'Quotationdetail Productname',
            'quotationdetail_unit' => 'Quotationdetail Unit',
            'quotationdetail_unitname' => 'Quotationdetail Unitname',
            'quotationdetail_price' => 'Quotationdetail Price',
            'quotationdetail_tax_code' => 'Quotationdetail Tax Code',
            'quotationdetail_tax_rate' => 'Quotationdetail Tax Rate',
            'quotationdetail_tax_amount' => 'Quotationdetail Tax Amount',
            'quotationdetail_gst_status' => 'Quotationdetail Gst Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuotationdetailQuotation()
    {
        return $this->hasOne(Tbquotation::className(), ['quotation_id' => 'quotationdetail_quotationid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuotationdetailProduct()
    {
        return $this->hasOne(Tbproduct::className(), ['product_id' => 'quotationdetail_productid']);
    }
}
