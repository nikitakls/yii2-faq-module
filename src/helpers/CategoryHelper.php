<?php
/**
 * NewsHelper.php
 * User: nikitakls
 * Date: 30.01.18
 * Time: 18:39
 */

namespace nikitakls\faq\helpers;


use yii\helpers\ArrayHelper;

class CategoryHelper
{
    const TYPE_FAQ = 10;
    const TYPE_HINT = 20;
    const TYPE_PAGE = 30;
    const TYPE_NEWS = 40;

    public static function label($status)
    {

        return ArrayHelper::getValue(self::getList(), $status);
    }

    public static function getList()
    {
        return [
            self::TYPE_FAQ => 'Faq',
            self::TYPE_HINT => 'Hint',
            self::TYPE_PAGE => 'Page',
            self::TYPE_NEWS => 'News',
        ];
    }

}