<?php

namespace nikitakls\faq\models\search;

use nikitakls\faq\helpers\StatusHelper;
use nikitakls\faq\models\Hint;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * HintSearch represents the model behind the search form of `nikitakls\faq\models\Hint`.
 * @author nikitakls
 */
class HintSearch extends Hint
{
    /**
     * @param $code
     * @return null|Hint
     */
    public static function findByCode($code)
    {
        return Hint::findOne(['code' => $code, 'status' => StatusHelper::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'status'], 'integer'],
            [['code', 'content', 'title', 'updated_at', 'created_at'], 'safe'],
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
        $query = Hint::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
