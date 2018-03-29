<?php

namespace nikitakls\faq\models\query;

use nikitakls\faq\helpers\StatusHelper;
use nikitakls\faq\models\Answer;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Answer]].
 * @author nikitakls
 *
 * @see Answer
 */
class AnswerQuery extends ActiveQuery
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
     * @return Answer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Answer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
