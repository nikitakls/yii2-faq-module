<?php
/**
 * UrlHelper.php
 * User: nikitakls
 * Date: 02.02.18
 * Time: 12:19
 */

namespace nikitakls\faq;


class UrlHelper
{
    public static function getSlugAlias($slug, $route)
    {
        return [
            'class' => \yii\web\UrlRule::class,
            'pattern' => $slug,
            'route' => $route,
            'defaults' => ['slug' => $slug],
        ];
    }

}