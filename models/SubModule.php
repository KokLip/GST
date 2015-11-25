<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbsubmodule".
 *
 * @property integer $sub_module_id
 * @property integer $module_id
 * @property string $sub_module_name
 * @property string $sub_module_active
 *
 * @property Tbaccess2[] $tbaccess2s
 * @property Tbmodule $module
 */
class SubModule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbsubmodule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['module_id', 'sub_module_name', 'sub_module_active'], 'required'],
            [['module_id'], 'integer'],
            [['sub_module_name'], 'string', 'max' => 55],
            [['sub_module_active'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sub_module_id' => 'Sub Module ID',
            'module_id' => 'Module ID',
            'sub_module_name' => 'Sub Module Name',
            'sub_module_active' => 'Sub Module Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbaccess2s()
    {
        return $this->hasMany(Tbaccess2::className(), ['sub_module_id' => 'sub_module_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModule()
    {
        return $this->hasOne(Tbmodule::className(), ['module_id' => 'module_id']);
    }
}
