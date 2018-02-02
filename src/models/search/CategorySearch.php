<?php

namespace nikitakls\faq\models\search;

use nikitakls\faq\helpers\CategoryHelper;
use nikitakls\faq\models\Category;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CategorySearch represents the model behind the search form of `nikitakls\faq\models\Category`.
 */
class CategorySearch extends Category
{
    public static function getHintLists($asArray = true)
    {
        return self::getList(CategoryHelper::TYPE_HINT, $asArray);
    }

    /**
     * @param integer $type
     * @return array
     */
    public static function getList($type, $asArray = true)
    {
        $result = [];
        $items = Category::find()->where([
            'type' => $type,
        ]);
        if ($asArray) {
            $items->asArray();
            foreach ($items->all() as $item) {
                $result[$item['id']] = $item['title'];
            }

        } else {
            foreach ($items->all() as $item) {
                $result[$item['id']] = $item;
            }
        }

        return $result;
    }

    public static function getNewsLists($asArray = true)
    {
        return self::getList(CategoryHelper::TYPE_NEWS, $asArray);
    }

    public static function getFaqLists($asArray = true)
    {
        return self::getList(CategoryHelper::TYPE_FAQ, $asArray);
    }

    public static function getPageLists($asArray = true)
    {
        return self::getList(CategoryHelper::TYPE_PAGE, $asArray);
    }

    /** @return Category */
    public static function getCategoryBySlug($slug)
    {
        return Category::find()->where([
            'slug' => $slug,
        ])->one();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'type'], 'integer'],
            [['title', 'slug', 'icon'], 'safe'],
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
        $query = Category::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'icon', $this->icon]);

        return $dataProvider;
    }

}
