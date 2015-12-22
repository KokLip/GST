<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Quotation;

/**
 * QuotationSearch represents the model behind the search form about `app\models\Quotation`.
 */
class QuotationSearch extends Quotation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quotation_id', 'quotation_no', 'quotation_customerid', 'quotation_createid', 'quotation_tax_percent', 'quotation_revision'], 'integer'],
            [['quotation_date', 'quotation_date_transaction', 'quotation_createname', 'quotation_remark', 'quotation_system', 'quotation_partno', 'quotation_invoice', 'quotation_deliveryorder', 'quotation_tax_label', 'quotation_printed_status', 'quotation_no_user_format'], 'safe'],
            [['quotation_charge', 'quotation_tax_amount', 'quotation_parts_total', 'quotation_gst_payable'], 'number'],
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
        $query = Quotation::find();

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
            'quotation_id' => $this->quotation_id,
            'quotation_no' => $this->quotation_no,
            'quotation_date' => $this->quotation_date,
            'quotation_date_transaction' => $this->quotation_date_transaction,
            'quotation_customerid' => $this->quotation_customerid,
            'quotation_createid' => $this->quotation_createid,
            'quotation_charge' => $this->quotation_charge,
            'quotation_tax_percent' => $this->quotation_tax_percent,
            'quotation_tax_amount' => $this->quotation_tax_amount,
            'quotation_revision' => $this->quotation_revision,
            'quotation_parts_total' => $this->quotation_parts_total,
            'quotation_gst_payable' => $this->quotation_gst_payable,
        ]);

        $query->andFilterWhere(['like', 'quotation_createname', $this->quotation_createname])
            ->andFilterWhere(['like', 'quotation_remark', $this->quotation_remark])
            ->andFilterWhere(['like', 'quotation_system', $this->quotation_system])
            ->andFilterWhere(['like', 'quotation_partno', $this->quotation_partno])
            ->andFilterWhere(['like', 'quotation_invoice', $this->quotation_invoice])
            ->andFilterWhere(['like', 'quotation_deliveryorder', $this->quotation_deliveryorder])
            ->andFilterWhere(['like', 'quotation_tax_label', $this->quotation_tax_label])
            ->andFilterWhere(['like', 'quotation_printed_status', $this->quotation_printed_status])
            ->andFilterWhere(['like', 'quotation_no_user_format', $this->quotation_no_user_format]);

        return $dataProvider;
    }
}
