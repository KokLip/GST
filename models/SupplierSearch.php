<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Supplier;

/**
 * SupplierSearch represents the model behind the search form about `app\models\Supplier`.
 */
class SupplierSearch extends Supplier
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supplier_id', 'supplier_poscode'], 'integer'],
            [['supplier_name', 'supplier_add1', 'supplier_add2', 'supplier_add3', 'supplier_tel', 'supplier_fax', 'supplier_email', 'supplier_type', 'supplier_remark', 'supplier_attention', 'supplier_active', 'supplier_GSTno'], 'safe'],
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
        $query = Supplier::find();

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
            'supplier_id' => $this->supplier_id,
            'supplier_poscode' => $this->supplier_poscode,
        ]);

        $query->andFilterWhere(['like', 'supplier_name', $this->supplier_name])
            ->andFilterWhere(['like', 'supplier_add1', $this->supplier_add1])
            ->andFilterWhere(['like', 'supplier_add2', $this->supplier_add2])
            ->andFilterWhere(['like', 'supplier_add3', $this->supplier_add3])
            ->andFilterWhere(['like', 'supplier_tel', $this->supplier_tel])
            ->andFilterWhere(['like', 'supplier_fax', $this->supplier_fax])
            ->andFilterWhere(['like', 'supplier_email', $this->supplier_email])
            ->andFilterWhere(['like', 'supplier_type', $this->supplier_type])
            ->andFilterWhere(['like', 'supplier_remark', $this->supplier_remark])
            ->andFilterWhere(['like', 'supplier_attention', $this->supplier_attention])
            ->andFilterWhere(['like', 'supplier_active', $this->supplier_active])
            ->andFilterWhere(['like', 'supplier_GSTno', $this->supplier_GSTno]);

        return $dataProvider;
    }
}
