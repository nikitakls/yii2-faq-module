<?php

namespace nikitakls\faq\models\query;

use nikitakls\faq\helpers\StatusHelper;
use nikitakls\faq\models\News;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[News]].
 * @author nikitakls
 *
 * @see News
 */
class NewsQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function active()
    {
        return $this->andWhere(['status' => StatusHelper::STATUS_ACTIVE]);
    }

    /**
     * @return $this
     */
    public function draft()
    {
        return $this->andWhere(['status' => StatusHelper::STATUS_DRAFT]);
    }

    /**
     * @inheritdoc
     * @return News[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return News|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
