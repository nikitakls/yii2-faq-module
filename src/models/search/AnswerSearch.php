<?php

namespace nikitakls\faq\models\search;

use nikitakls\faq\models\Answer;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AnswerSearch represents the model behind the search form of `nikitakls\faq\models\Answer`.
 */
class AnswerSearch extends Answer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['question'], 'safe'],
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
     * @return Answer[]
     */
    public function search($params, $categoryId = null)
    {
        $query = Answer::find()->active();

        $this->load($params);

        if (!$this->validate()) {
            return [];
        }
        if (is_null($categoryId)) {
            $categoryId = $this->category_id;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $categoryId,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $query->all();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function dataSearch($params)
    {
        $query = Answer::find()->active();

        $this->load($params);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        $query->with('category');

        return $dataProvider;
    }
}
