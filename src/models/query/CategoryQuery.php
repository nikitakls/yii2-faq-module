<?php

namespace nikitakls\faq\models\query;

use nikitakls\faq\helpers\StatusHelper;
use nikitakls\faq\models\Category;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Category]].
 * @author nikitakls
 *
 * @see Category
 */
class CategoryQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function active()
    {
        return $this->andWhere(['status' => StatusHelper::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     * @return Category[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Category|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
