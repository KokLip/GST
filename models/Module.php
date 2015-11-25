<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbmodule".
 *
 * @property integer $module_id
 * @property string $module_name
 * @property string $module_active
 *
 * @property Tbsubmodule[] $tbsubmodules
 */
class Module extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbmodule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['module_name', 'module_active'], 'required'],
            [['module_name'], 'string', 'max' => 55],
            [['module_active'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'module_id' => 'Module ID',
            'module_name' => 'Module Name',
            'module_active' => 'Module Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbsubmodules()
    {
        return $this->hasMany(Tbsubmodule::className(), ['module_id' => 'module_id']);
    }
}
