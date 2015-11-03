<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form about `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'product_stock', 'product_categoryid', 'product_reorderLevel', 'product_markupPercent'], 'integer'],
            [['product_partno', 'product_name', 'product_description', 'product_unitName', 'product_active', 'product_type'], 'safe'],
            [['product_sellingPice', 'product_averageCost'], 'number'],
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
        $query = Product::find();

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
            'product_id' => $this->product_id,
            'product_sellingPice' => $this->product_sellingPice,
            'product_stock' => $this->product_stock,
            'product_categoryid' => $this->product_categoryid,
            'product_reorderLevel' => $this->product_reorderLevel,
            'product_averageCost' => $this->product_averageCost,
            'product_markupPercent' => $this->product_markupPercent,
        ]);

        $query->andFilterWhere(['like', 'product_partno', $this->product_partno])
            ->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'product_description', $this->product_description])
            ->andFilterWhere(['like', 'product_unitName', $this->product_unitName])
            ->andFilterWhere(['like', 'product_active', $this->product_active])
            ->andFilterWhere(['like', 'product_type', $this->product_type]);

        return $dataProvider;
    }
}
