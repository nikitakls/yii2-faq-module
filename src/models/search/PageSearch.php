<?php

namespace nikitakls\faq\models\search;

use nikitakls\faq\models\Page;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PageSearch represents the model behind the search form of `nikitakls\faq\models\Page`.
 * @author nikitakls
 */
class PageSearch extends Page
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['content', 'clean_content'], 'safe'],
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
        $query = Page::find();

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
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        $query->with('category');

        $query->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'clean_content', $this->clean_content]);

        return $dataProvider;
    }

    /**
     * Get page by slug
     *
     * @param string $slug
     * @param bool $active
     *
     * @return Page
     */
    public function findBySlug($slug, $active = true)
    {
        $query = Page::find()->where([
            'slug' => $slug,
        ]);
        if ($active) {
            $query->active();
        }

        return $query->limit(1)->one();
    }
}
