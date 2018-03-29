<?php

namespace nikitakls\faq\helpers;

use nikitakls\faq\Faq;
use yii\helpers\ArrayHelper;

/**
 * Class CategoryHelper
 * @package nikitakls\faq\helpers
 * @author  nikitakls
 */
class CategoryHelper
{
    const TYPE_FAQ = 10;
    const TYPE_HINT = 20;
    const TYPE_PAGE = 30;
    const TYPE_NEWS = 40;

    /**
     * @param int $status
     * @return mixed
     */
    public static function label($status)
    {
        return ArrayHelper::getValue(self::getList(), $status);
    }

    /**
     * @return array
     */
    public static function getList()
    {
        return [
            self::TYPE_FAQ => Faq::t('base', 'Faq'),
            self::TYPE_HINT => Faq::t('base', 'Hint'),
            self::TYPE_PAGE => Faq::t('base', 'Page'),
            self::TYPE_NEWS => Faq::t('base', 'News'),
        ];
    }

}