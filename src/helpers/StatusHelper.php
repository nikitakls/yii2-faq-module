<?php

namespace nikitakls\faq\helpers;


use nikitakls\faq\Faq;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * StatusHelper
 * @author  nikitakls
 */
class StatusHelper
{
    const STATUS_DRAFT = 1;
    const STATUS_ACTIVE = 2;

    /**
     * @param $status
     * @return string
     */
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

    /**
     * @return array
     */
    public static function getStatusList()
    {
        return [
            self::STATUS_ACTIVE => Faq::t('base', 'Active'),
            self::STATUS_DRAFT => Faq::t('base', 'Draft'),
        ];
    }

}