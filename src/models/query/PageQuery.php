<?php

namespace nikitakls\faq\models\query;

use nikitakls\faq\helpers\StatusHelper;
use nikitakls\faq\models\Page;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Page]].
 * @author nikitakls
 *
 * @see Page
 */
class PageQuery extends ActiveQuery
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
     * @return Page[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Page|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
