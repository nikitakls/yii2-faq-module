<?php

namespace nikitakls\faq;

use Yii;
use yii\base\Module as BaseModule;

class Module extends BaseModule
{
    const VERSION = '0.0.1';

    public $layouts = [
        'main' => 'main.php',
        'faq' => 'faq.php',
        'news' => 'news.php',
        'page' => 'page.php',
    ];

    public $layoutPath = "/view/layouts";

    public $urlPrefix = 'faq';

    public $urlRules = [
        'page' => 'public/index',
        'info' => 'public/search',
        'news' => 'admin/qa/index',
        'index' => 'admin/groups/create',
    ];

    public $filesUploadUrl = '@web/uploads/support';
    public $filesUploadDir = '@webroot/uploads/support';

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'nikitakls\module\controllers';


    public function getAdminMenu()
    {
        return [
            'support' => [
                'icon' => 'fa fa-fw fa-support',
                'label' => Yii::t('support', 'Support'),
                'position' => 30,
                'visible' => (Yii::$app->user->can('support_admin') || Yii::$app->user->can('support_publisher')),
                'items' => [
                    [
                        'label' => Yii::t('support', 'FAQ'),
                        'url' => ['/support/page/index'],
                        'visible' => Yii::$app->user->can('support_publisher')
                    ],
                ]
            ]
        ];
    }

}