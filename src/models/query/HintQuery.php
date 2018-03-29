<?php

namespace nikitakls\faq\models\query;

use nikitakls\faq\helpers\StatusHelper;
use nikitakls\faq\models\Hint;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Hint]].
 * @author nikitakls
 *
 * @see Hint
 */
class HintQuery extends ActiveQuery
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
     * @return Hint[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Hint|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
