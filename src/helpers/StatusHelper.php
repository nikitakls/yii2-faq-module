<?php
/**
 * NewsHelper.php
 * User: nikitakls
 * Date: 30.01.18
 * Time: 18:39
 */

namespace nikitakls\faq\helpers;


use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class StatusHelper
{
    const STATUS_DRAFT = 1;
    const STATUS_ACTIVE = 2;

    public static function statusLabel($status)
    {
        switch ($status) {
            case self::STATUS_ACTIVE:
                $class = 'label label-success';
                break;
            case self::STATUS_DRAFT:
                $class = 'label label-default';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::getStatusList(), $status), [
            'class' => $class,
        ]);
    }

    public static function getStatusList()
    {
        return [
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_DRAFT => 'Draft',
        ];
    }

}