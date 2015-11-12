<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbsupplier".
 *
 * @property integer $supplier_id
 * @property string $supplier_name
 * @property string $supplier_add1
 * @property string $supplier_add2
 * @property string $supplier_add3
 * @property integer $supplier_poscode
 * @property string $supplier_tel
 * @property string $supplier_fax
 * @property string $supplier_email
 * @property string $supplier_type
 * @property string $supplier_remark
 * @property string $supplier_attention
 * @property string $supplier_active
 * @property string $supplier_GSTno
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbsupplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supplier_name', 'supplier_add1', 'supplier_add2', 'supplier_add3', 'supplier_poscode', 'supplier_tel', 'supplier_fax', 'supplier_email', 'supplier_type', 'supplier_remark', 'supplier_attention', 'supplier_active', 'supplier_GSTno'], 'required'],
            [['supplier_add1', 'supplier_add2', 'supplier_add3', 'supplier_remark'], 'string'],
            [['supplier_poscode'], 'integer'],
            [['supplier_name', 'supplier_attention'], 'string', 'max' => 55],
            [['supplier_tel', 'supplier_fax'], 'string', 'max' => 15],
            [['supplier_email'], 'string', 'max' => 255],
            [['supplier_type', 'supplier_active'], 'string', 'max' => 1],
            [['supplier_GSTno'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'supplier_id' => 'Supplier ID',
            'supplier_name' => 'Supplier Name',
            'supplier_add1' => 'Supplier Add1',
            'supplier_add2' => 'Supplier Add2',
            'supplier_add3' => 'Supplier Add3',
            'supplier_poscode' => 'Supplier Poscode',
            'supplier_tel' => 'Supplier Tel',
            'supplier_fax' => 'Supplier Fax',
            'supplier_email' => 'Supplier Email',
            'supplier_type' => 'Supplier Type',
            'supplier_remark' => 'Supplier Remark',
            'supplier_attention' => 'Supplier Attention',
            'supplier_active' => 'Supplier Active',
            'supplier_GSTno' => 'Supplier  Gstno',
        ];
    }
}
