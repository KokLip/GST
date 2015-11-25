<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbaccess2".
 *
 * @property integer $access_id
 * @property integer $user_id
 * @property integer $sub_module_id
 * @property string $access_active
 *
 * @property Tbuser $user
 * @property Tbsubmodule $subModule
 */
class Access2 extends \yii\db\ActiveRecord
{
	public $permission;
	public $permission2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbaccess2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'sub_module_id'], 'required'],
            [['user_id', 'sub_module_id'], 'integer'],
            [['access_active'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'access_id' => 'Access ID',
            'user_id' => 'User ID',
            'sub_module_id' => 'Sub Module ID',
            'access_active' => 'Access Active',
			'permission' => 'permission',
			'permission2' => 'permission2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Tbuser::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubModule()
    {
        return $this->hasOne(Tbsubmodule::className(), ['sub_module_id' => 'sub_module_id']);
    }
}
