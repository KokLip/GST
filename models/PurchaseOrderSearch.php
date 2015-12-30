<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PurchaseOrder;

/**
 * PurchaseOrderSearch represents the model behind the search form about `app\models\PurchaseOrder`.
 */
class PurchaseOrderSearch extends PurchaseOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchaseorder_id', 'purchaseorder_no', 'purchaseorder_customerid', 'purchaseorder_supplierid', 'purchaseorder_supplier_quotation_no', 'purchaseorder_createid', 'purchaseorder_tax_percent', 'purchaseorder_revision', 'purchaseorder_deleteid', 'purchaseorder_creditorid', 'purchaseorder_projectid'], 'integer'],
            [['purchaseorder_date', 'purchaseorder_date_transaction', 'purchaseorder_date_delete', 'purchaseorder_createname', 'purchaseorder_remark', 'purchaseorder_system', 'purchaseorder_partno', 'purchaseorder_update_stock_status', 'purchaseorder_status', 'purchaseorder_tax_label', 'purchaseorder_printed_status', 'purchaseorder_payment_status', 'purchaseorder_no_user_format', 'purchaseorder_auto_generate'], 'safe'],
            [['purchaseorder_charge', 'purchaseorder_tax_amount', 'purchaseorder_parts_total', 'purchaseorder_purchase_return', 'purchaseorder_payment_paid_thus_far', 'purchaseorder_outstanding_amount', 'purchaseorder_gst_payable', 'purchaseorder_total_amount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PurchaseOrder::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'purchaseorder_id' => $this->purchaseorder_id,
            'purchaseorder_no' => $this->purchaseorder_no,
            'purchaseorder_date' => $this->purchaseorder_date,
            'purchaseorder_date_transaction' => $this->purchaseorder_date_transaction,
            'purchaseorder_date_delete' => $this->purchaseorder_date_delete,
            'purchaseorder_customerid' => $this->purchaseorder_customerid,
            'purchaseorder_supplierid' => $this->purchaseorder_supplierid,
            'purchaseorder_supplier_quotation_no' => $this->purchaseorder_supplier_quotation_no,
            'purchaseorder_createid' => $this->purchaseorder_createid,
            'purchaseorder_charge' => $this->purchaseorder_charge,
            'purchaseorder_tax_percent' => $this->purchaseorder_tax_percent,
            'purchaseorder_tax_amount' => $this->purchaseorder_tax_amount,
            'purchaseorder_revision' => $this->purchaseorder_revision,
            'purchaseorder_parts_total' => $this->purchaseorder_parts_total,
            'purchaseorder_deleteid' => $this->purchaseorder_deleteid,
            'purchaseorder_creditorid' => $this->purchaseorder_creditorid,
            'purchaseorder_purchase_return' => $this->purchaseorder_purchase_return,
            'purchaseorder_payment_paid_thus_far' => $this->purchaseorder_payment_paid_thus_far,
            'purchaseorder_outstanding_amount' => $this->purchaseorder_outstanding_amount,
            'purchaseorder_projectid' => $this->purchaseorder_projectid,
            'purchaseorder_gst_payable' => $this->purchaseorder_gst_payable,
            'purchaseorder_total_amount' => $this->purchaseorder_total_amount,
        ]);

        $query->andFilterWhere(['like', 'purchaseorder_createname', $this->purchaseorder_createname])
            ->andFilterWhere(['like', 'purchaseorder_remark', $this->purchaseorder_remark])
            ->andFilterWhere(['like', 'purchaseorder_system', $this->purchaseorder_system])
            ->andFilterWhere(['like', 'purchaseorder_partno', $this->purchaseorder_partno])
            ->andFilterWhere(['like', 'purchaseorder_update_stock_status', $this->purchaseorder_update_stock_status])
            ->andFilterWhere(['like', 'purchaseorder_status', $this->purchaseorder_status])
            ->andFilterWhere(['like', 'purchaseorder_tax_label', $this->purchaseorder_tax_label])
            ->andFilterWhere(['like', 'purchaseorder_printed_status', $this->purchaseorder_printed_status])
            ->andFilterWhere(['like', 'purchaseorder_payment_status', $this->purchaseorder_payment_status])
            ->andFilterWhere(['like', 'purchaseorder_no_user_format', $this->purchaseorder_no_user_format])
            ->andFilterWhere(['like', 'purchaseorder_auto_generate', $this->purchaseorder_auto_generate]);

        return $dataProvider;
    }
}
