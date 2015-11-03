<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbcompany".
 *
 * @property integer $company_id
 * @property string $company_name
 * @property string $company_number
 * @property string $company_add1
 * @property string $company_add2
 * @property string $company_add3
 * @property integer $company_poscode
 * @property string $company_tel1
 * @property string $company_tel2
 * @property string $company_fax
 * @property string $company_email
 * @property string $company_website
 * @property string $company_inventory
 * @property string $company_partno
 * @property string $company_discount
 * @property string $company_expiry
 * @property string $company_quotationText
 * @property string $company_invoiceText
 * @property string $company_purchaseOrderText
 * @property string $company_deliveryOrderText
 * @property string $company_creditNoteText
 * @property string $company_debitNoteText
 * @property string $company_receiptText
 * @property string $company_taxLabel
 * @property integer $company_taxPercent
 * @property string $company_printerFormat
 * @property string $company_letterHead
 * @property string $company_autogenerateNo
 * @property string $company_other
 * @property string $company_code
 * @property integer $company_title
 * @property integer $company_printSize
 * @property string $company_GSTno
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbcompany';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_number', 'company_add1', 'company_poscode', 'company_tel1','company_fax', 'company_email', 'company_website', 'company_expiry', 'company_quotationText', 'company_invoiceText', 'company_purchaseOrderText', 'company_deliveryOrderText', 'company_creditNoteText', 'company_debitNoteText', 'company_receiptText', 'company_taxLabel', 'company_taxPercent', 'company_other', 'company_code', 'company_GSTno'], 'required'],
            [['company_name', 'company_add1', 'company_add2', 'company_add3', 'company_quotationText', 'company_invoiceText', 'company_purchaseOrderText', 'company_deliveryOrderText', 'company_creditNoteText', 'company_debitNoteText', 'company_receiptText'], 'string'],
            [['company_poscode', 'company_taxPercent', 'company_title', 'company_printSize'], 'integer'],
            [['company_expiry'], 'safe'],
            [['company_number'], 'string', 'max' => 20],
            [['company_tel1', 'company_tel2', 'company_fax'], 'string', 'max' => 15],
            [['company_name', 'company_email', 'company_website'], 'string', 'max' => 255],
            [['company_inventory', 'company_partno', 'company_discount', 'company_printerFormat', 'company_letterHead', 'company_autogenerateNo'], 'string', 'max' => 1],
            [['company_taxLabel', 'company_code'], 'string', 'max' => 5],
            [['company_other'], 'string', 'max' => 7],
            [['company_GSTno'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'company_name' => 'Company Name',
            'company_number' => 'Company Number',
            'company_add1' => 'Company Address',
            'company_add2' => 'Company Add2',
            'company_add3' => 'Company Add3',
            'company_poscode' => 'Company Poscode',
            'company_tel1' => 'Tel 1',
            'company_tel2' => 'Tel 2',
            'company_fax' => 'Fax',
            'company_email' => 'Email',
            'company_website' => 'Website',
            'company_inventory' => 'System Type',
            'company_partno' => 'Company Partno',
            'company_discount' => 'Discount Column (Invoice)',
            'company_expiry' => 'Expiry Date',
            'company_quotationText' => 'Quotation Terms',
            'company_invoiceText' => 'Invoice Terms',
            'company_purchaseOrderText' => 'Purchase Order Terms',
            'company_deliveryOrderText' => 'Delivery Order Terms',
            'company_creditNoteText' => 'Credit Note Terms',
            'company_debitNoteText' => 'Debit Note Terms',
            'company_receiptText' => 'Receipt Terms',
            'company_taxLabel' => 'Tax Label',
            'company_taxPercent' => 'Tax Percent',
            'company_printerFormat' => 'Printer Format',
            'company_letterHead' => 'Letter Head',
            'company_autogenerateNo' => 'Doc No System',
            'company_other' => 'Term Used',
            'company_code' => 'Company Code',
            'company_title' => 'Doc Title',
            'company_printSize' => 'Bill Size',
            'company_GSTno' => 'GST No',
        ];
    }
}
