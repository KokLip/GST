<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbtaxcode_supply".
 *
 * @property integer $tax_id
 * @property string $tax_code
 * @property integer $tax_rate
 * @property string $tax_description
 */
class Tax extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbtaxcode_supply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tax_code', 'tax_rate', 'tax_description'], 'required'],
            [['tax_rate'], 'integer'],
            [['tax_description'], 'string'],
            [['tax_code'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tax_id' => 'Tax ID',
            'tax_code' => 'Tax Code',
            'tax_rate' => 'Tax Rate',
            'tax_description' => 'Tax Description',
        ];
    }
}
