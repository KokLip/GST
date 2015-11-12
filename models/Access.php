<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbaccess".
 *
 * @property integer $access_id
 * @property integer $user_id
 * @property integer $access_admin_view
 * @property integer $access_admin_update
 * @property integer $access_category_index
 * @property integer $access_category_view
 * @property integer $access_category_create
 * @property integer $access_category_update
 * @property integer $access_category_delete
 * @property integer $access_service_index
 * @property integer $access_service_view
 * @property integer $access_service_create
 * @property integer $access_service_update
 * @property integer $access_service_delete
 * @property integer $access_product_index
 * @property integer $access_product_view
 * @property integer $access_product_create
 * @property integer $access_product_update
 * @property integer $access_product_delete
 * @property integer $access_customer_index
 * @property integer $access_customer_view
 * @property integer $access_customer_create
 * @property integer $access_customer_update
 * @property integer $access_customer_delete
 * @property integer $access_supplier_index
 * @property integer $access_supplier_view
 * @property integer $access_supplier_create
 * @property integer $access_supplier_update
 * @property integer $access_supplier_delete
 * @property string $access_active
 *
 * @property Tbuser $user
 */
class Access extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbaccess';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'access_admin_view', 'access_admin_update', 'access_category_index', 'access_category_view', 'access_category_create', 'access_category_update', 'access_category_delete', 'access_service_index', 'access_service_view', 'access_service_create', 'access_service_update', 'access_service_delete', 'access_product_index', 'access_product_view', 'access_product_create', 'access_product_update', 'access_product_delete', 'access_customer_index', 'access_customer_view', 'access_customer_create', 'access_customer_update', 'access_customer_delete', 'access_supplier_index', 'access_supplier_view', 'access_supplier_create', 'access_supplier_update', 'access_supplier_delete', 'access_active'], 'required'],
            [['user_id', 'access_admin_view', 'access_admin_update', 'access_category_index', 'access_category_view', 'access_category_create', 'access_category_update', 'access_category_delete', 'access_service_index', 'access_service_view', 'access_service_create', 'access_service_update', 'access_service_delete', 'access_product_index', 'access_product_view', 'access_product_create', 'access_product_update', 'access_product_delete', 'access_customer_index', 'access_customer_view', 'access_customer_create', 'access_customer_update', 'access_customer_delete', 'access_supplier_index', 'access_supplier_view', 'access_supplier_create', 'access_supplier_update', 'access_supplier_delete'], 'integer'],
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
            'access_admin_view' => 'Access Admin View',
            'access_admin_update' => 'Access Admin Update',
            'access_category_index' => 'Access Category Index',
            'access_category_view' => 'Access Category View',
            'access_category_create' => 'Access Category Create',
            'access_category_update' => 'Access Category Update',
            'access_category_delete' => 'Access Category Delete',
            'access_service_index' => 'Access Service Index',
            'access_service_view' => 'Access Service View',
            'access_service_create' => 'Access Service Create',
            'access_service_update' => 'Access Service Update',
            'access_service_delete' => 'Access Service Delete',
            'access_product_index' => 'Access Product Index',
            'access_product_view' => 'Access Product View',
            'access_product_create' => 'Access Product Create',
            'access_product_update' => 'Access Product Update',
            'access_product_delete' => 'Access Product Delete',
            'access_customer_index' => 'Access Customer Index',
            'access_customer_view' => 'Access Customer View',
            'access_customer_create' => 'Access Customer Create',
            'access_customer_update' => 'Access Customer Update',
            'access_customer_delete' => 'Access Customer Delete',
            'access_supplier_index' => 'Access Supplier Index',
            'access_supplier_view' => 'Access Supplier View',
            'access_supplier_create' => 'Access Supplier Create',
            'access_supplier_update' => 'Access Supplier Update',
            'access_supplier_delete' => 'Access Supplier Delete',
            'access_active' => 'Access Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Tbuser::className(), ['user_id' => 'user_id']);
    }
}
