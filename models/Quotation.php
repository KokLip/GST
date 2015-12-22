<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbquotation".
 *
 * @property integer $quotation_id
 * @property integer $quotation_no
 * @property string $quotation_date
 * @property string $quotation_date_transaction
 * @property integer $quotation_customerid
 * @property integer $quotation_createid
 * @property string $quotation_createname
 * @property string $quotation_remark
 * @property string $quotation_system
 * @property string $quotation_partno
 * @property string $quotation_invoice
 * @property string $quotation_deliveryorder
 * @property string $quotation_charge
 * @property string $quotation_tax_label
 * @property integer $quotation_tax_percent
 * @property string $quotation_tax_amount
 * @property string $quotation_printed_status
 * @property integer $quotation_revision
 * @property string $quotation_parts_total
 * @property string $quotation_no_user_format
 * @property string $quotation_gst_payable
 *
 * @property Tbcustomer $quotationCustomer
 * @property Tbuser $quotationCreate
 * @property Tbquotationdetail[] $tbquotationdetails
 */
class Quotation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbquotation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quotation_no', 'quotation_date', 'quotation_date_transaction', 'quotation_customerid', 'quotation_createid', 'quotation_createname', 'quotation_remark', 'quotation_system', 'quotation_invoice', 'quotation_deliveryorder', 'quotation_charge', 'quotation_tax_label', 'quotation_tax_percent', 'quotation_tax_amount', 'quotation_parts_total', 'quotation_no_user_format', 'quotation_gst_payable'], 'required'],
            [['quotation_no', 'quotation_customerid', 'quotation_createid', 'quotation_tax_percent', 'quotation_revision'], 'integer'],
            [['quotation_date', 'quotation_date_transaction'], 'safe'],
            [['quotation_remark'], 'string'],
            [['quotation_charge', 'quotation_tax_amount', 'quotation_parts_total', 'quotation_gst_payable'], 'number'],
            [['quotation_createname'], 'string', 'max' => 55],
            [['quotation_system', 'quotation_partno', 'quotation_printed_status'], 'string', 'max' => 1],
            [['quotation_invoice', 'quotation_deliveryorder', 'quotation_no_user_format'], 'string', 'max' => 12],
            [['quotation_tax_label'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'quotation_id' => 'Quotation ID',
            'quotation_no' => 'Quotation No',
            'quotation_date' => 'Quotation Date',
            'quotation_date_transaction' => 'Quotation Date Transaction',
            'quotation_customerid' => 'Quotation Customerid',
            'quotation_createid' => 'Quotation Createid',
            'quotation_createname' => 'Quotation Createname',
            'quotation_remark' => 'Quotation Remark',
            'quotation_system' => 'Quotation System',
            'quotation_partno' => 'Quotation Partno',
            'quotation_invoice' => 'Quotation Invoice',
            'quotation_deliveryorder' => 'Quotation Deliveryorder',
            'quotation_charge' => 'Quotation Charge',
            'quotation_tax_label' => 'Quotation Tax Label',
            'quotation_tax_percent' => 'Quotation Tax Percent',
            'quotation_tax_amount' => 'Quotation Tax Amount',
            'quotation_printed_status' => 'Quotation Printed Status',
            'quotation_revision' => 'Quotation Revision',
            'quotation_parts_total' => 'Quotation Parts Total',
            'quotation_no_user_format' => 'Quotation No User Format',
            'quotation_gst_payable' => 'Quotation Gst Payable',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuotationCustomer()
    {
        return $this->hasOne(Tbcustomer::className(), ['customer_id' => 'quotation_customerid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuotationCreate()
    {
        return $this->hasOne(Tbuser::className(), ['user_id' => 'quotation_createid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbquotationdetails()
    {
        return $this->hasMany(Tbquotationdetail::className(), ['quotationdetail_quotationid' => 'quotation_id']);
    }
}
