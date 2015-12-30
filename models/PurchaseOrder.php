<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbpurchaseorder".
 *
 * @property integer $purchaseorder_id
 * @property integer $purchaseorder_no
 * @property string $purchaseorder_date
 * @property string $purchaseorder_date_transaction
 * @property string $purchaseorder_date_delete
 * @property integer $purchaseorder_customerid
 * @property integer $purchaseorder_supplierid
 * @property integer $purchaseorder_supplier_quotation_no
 * @property integer $purchaseorder_createid
 * @property string $purchaseorder_createname
 * @property string $purchaseorder_remark
 * @property string $purchaseorder_system
 * @property string $purchaseorder_partno
 * @property string $purchaseorder_charge
 * @property string $purchaseorder_update_stock_status
 * @property string $purchaseorder_status
 * @property string $purchaseorder_tax_label
 * @property integer $purchaseorder_tax_percent
 * @property string $purchaseorder_tax_amount
 * @property string $purchaseorder_printed_status
 * @property integer $purchaseorder_revision
 * @property string $purchaseorder_parts_total
 * @property integer $purchaseorder_deleteid
 * @property string $purchaseorder_payment_status
 * @property string $purchaseorder_no_user_format
 * @property string $purchaseorder_auto_generate
 * @property integer $purchaseorder_creditorid
 * @property string $purchaseorder_purchase_return
 * @property string $purchaseorder_payment_paid_thus_far
 * @property string $purchaseorder_outstanding_amount
 * @property integer $purchaseorder_projectid
 * @property string $purchaseorder_gst_payable
 * @property string $purchaseorder_total_amount
 *
 * @property Tbcustomer $purchaseorderCustomer
 * @property Tbsupplier $purchaseorderSupplier
 * @property Tbuser $purchaseorderCreate
 * @property Tbpurchaseorderdetail[] $tbpurchaseorderdetails
 */
class PurchaseOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbpurchaseorder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchaseorder_no', 'purchaseorder_date', 'purchaseorder_date_transaction', 'purchaseorder_date_delete', 'purchaseorder_customerid', 'purchaseorder_supplierid', 'purchaseorder_supplier_quotation_no', 'purchaseorder_createid', 'purchaseorder_createname', 'purchaseorder_remark', 'purchaseorder_system', 'purchaseorder_charge', 'purchaseorder_update_stock_status', 'purchaseorder_status', 'purchaseorder_tax_label', 'purchaseorder_tax_percent', 'purchaseorder_tax_amount', 'purchaseorder_parts_total', 'purchaseorder_deleteid', 'purchaseorder_payment_status', 'purchaseorder_no_user_format', 'purchaseorder_creditorid', 'purchaseorder_purchase_return', 'purchaseorder_payment_paid_thus_far', 'purchaseorder_outstanding_amount', 'purchaseorder_projectid', 'purchaseorder_gst_payable', 'purchaseorder_total_amount'], 'required'],
            [['purchaseorder_no', 'purchaseorder_customerid', 'purchaseorder_supplierid', 'purchaseorder_supplier_quotation_no', 'purchaseorder_createid', 'purchaseorder_tax_percent', 'purchaseorder_revision', 'purchaseorder_deleteid', 'purchaseorder_creditorid', 'purchaseorder_projectid'], 'integer'],
            [['purchaseorder_date', 'purchaseorder_date_transaction', 'purchaseorder_date_delete'], 'safe'],
            [['purchaseorder_remark'], 'string'],
            [['purchaseorder_charge', 'purchaseorder_tax_amount', 'purchaseorder_parts_total', 'purchaseorder_purchase_return', 'purchaseorder_payment_paid_thus_far', 'purchaseorder_outstanding_amount', 'purchaseorder_gst_payable', 'purchaseorder_total_amount'], 'number'],
            [['purchaseorder_createname'], 'string', 'max' => 55],
            [['purchaseorder_system', 'purchaseorder_partno', 'purchaseorder_status', 'purchaseorder_printed_status', 'purchaseorder_auto_generate'], 'string', 'max' => 1],
            [['purchaseorder_update_stock_status', 'purchaseorder_payment_status'], 'string', 'max' => 2],
            [['purchaseorder_tax_label'], 'string', 'max' => 10],
            [['purchaseorder_no_user_format'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'purchaseorder_id' => 'Purchaseorder ID',
            'purchaseorder_no' => 'Purchaseorder No',
            'purchaseorder_date' => 'Purchaseorder Date',
            'purchaseorder_date_transaction' => 'Purchaseorder Date Transaction',
            'purchaseorder_date_delete' => 'Purchaseorder Date Delete',
            'purchaseorder_customerid' => 'Purchaseorder Customerid',
            'purchaseorder_supplierid' => 'Purchaseorder Supplierid',
            'purchaseorder_supplier_quotation_no' => 'Purchaseorder Supplier Quotation No',
            'purchaseorder_createid' => 'Purchaseorder Createid',
            'purchaseorder_createname' => 'Purchaseorder Createname',
            'purchaseorder_remark' => 'Purchaseorder Remark',
            'purchaseorder_system' => 'Purchaseorder System',
            'purchaseorder_partno' => 'Purchaseorder Partno',
            'purchaseorder_charge' => 'Purchaseorder Charge',
            'purchaseorder_update_stock_status' => 'Purchaseorder Update Stock Status',
            'purchaseorder_status' => 'Purchaseorder Status',
            'purchaseorder_tax_label' => 'Purchaseorder Tax Label',
            'purchaseorder_tax_percent' => 'Purchaseorder Tax Percent',
            'purchaseorder_tax_amount' => 'Purchaseorder Tax Amount',
            'purchaseorder_printed_status' => 'Purchaseorder Printed Status',
            'purchaseorder_revision' => 'Purchaseorder Revision',
            'purchaseorder_parts_total' => 'Purchaseorder Parts Total',
            'purchaseorder_deleteid' => 'Purchaseorder Deleteid',
            'purchaseorder_payment_status' => 'Purchaseorder Payment Status',
            'purchaseorder_no_user_format' => 'Purchaseorder No User Format',
            'purchaseorder_auto_generate' => 'Purchaseorder Auto Generate',
            'purchaseorder_creditorid' => 'Purchaseorder Creditorid',
            'purchaseorder_purchase_return' => 'Purchaseorder Purchase Return',
            'purchaseorder_payment_paid_thus_far' => 'Purchaseorder Payment Paid Thus Far',
            'purchaseorder_outstanding_amount' => 'Purchaseorder Outstanding Amount',
            'purchaseorder_projectid' => 'Purchaseorder Projectid',
            'purchaseorder_gst_payable' => 'Purchaseorder Gst Payable',
            'purchaseorder_total_amount' => 'Purchaseorder Total Amount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseorderCustomer()
    {
        return $this->hasOne(Tbcustomer::className(), ['customer_id' => 'purchaseorder_customerid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseorderSupplier()
    {
        return $this->hasOne(Tbsupplier::className(), ['supplier_id' => 'purchaseorder_supplierid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseorderCreate()
    {
        return $this->hasOne(Tbuser::className(), ['user_id' => 'purchaseorder_createid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbpurchaseorderdetails()
    {
        return $this->hasMany(Tbpurchaseorderdetail::className(), ['purchaseorderdetail_purchaseorderid' => 'purchaseorder_id']);
    }
}
