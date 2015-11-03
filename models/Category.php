<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbcategory".
 *
 * @property integer $category_id
 * @property string $category_name
 * @property string $category_description
 *
 * @property Tbproduct[] $tbproducts
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbcategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name', 'category_description'], 'required'],
            [['category_description'], 'string'],
            [['category_name'], 'string', 'max' => 55]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
            'category_description' => 'Category Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbproducts()
    {
        return $this->hasMany(Tbproduct::className(), ['product_categoryid' => 'category_id']);
    }
}
