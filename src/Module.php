<?php

namespace nikitakls\faq;

use nikitakls\markdown\EditorMdWidget;
use Yii;
use yii\base\Module as BaseModule;
use yii\base\BootstrapInterface;


class Module extends BaseModule
{
    const VERSION = '0.0.1';

    public $layouts = [
        'main' => 'main.php',
        'faq' => 'faq.php',
        'news' => 'news.php',
        'page' => 'page.php',
    ];

    public $layoutPath = '@faq/views/backend/layouts';

    /**
     * @var string The prefix for user module URL.
     *
     * @See [[GroupUrlRule::prefix]]
     */
    public $urlPrefix = 'faq';

    /** @var array The rules to be used in URL management. */
    public $urlRules = [
        'answer/index' => 'answer/index',
        'answer/<slug:[\wd\-]+>' => 'answer/list',
        'page/index' => 'page/index',
        'page/<slug:[\wd\-]+>' => 'page/view',

        '<controller:\w+>/<id:\d+>' => '<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

        /*'page' => 'public/index',
        'info' => 'public/search',
        'news' => 'admin/qa/index',
        'index' => 'admin/groups/create',*/
    ];

    public $isBackend = true;

    public $editor = [
            'class' => EditorMdWidget::class,
            'language' => 'ru',
            'clientOptions' => [
                'height' => '150',
                // 'previewTheme' => 'dark',
                // 'editorTheme' => 'pastel-on-dark',
                'markdown' => '',
                'codeFold' => true,
                'syncScrolling' => true,
                'saveHTMLToTextarea' => true,
                'searchReplace' => true,
                'watch' => true,
                'htmlDecode' => 'style,script,iframe|on*',
                //'toolbar' => false,
                'placeholder' => 'enter text',
                'previewCodeHighlight' => true,
                'emoji' => false,
                //'taskList' => true,
                //'tocm' => true,         // Using [TOCM]
                //'tex' => true,    // tex disabled default
                //'flowChart' => true,             // support block schems
                'sequenceDiagram' => false,       // support,
                'imageUpload' => true,
                'imageFormats' => ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'webp'],
                'imageUploadURL' => '',
                'toolbarIcons' => [
                    "undo", "redo", "|",
                    "bold", "del", "italic", "list-ul", "list-ol", "hr", "|",
                    "code", "code-block", "|",
                    "image", "table", "link", "|",
                    "html-entities", "|",
                    "preview", "watch", "|",
                    "help"
                ],
            ]
    ];

    protected $filesUploadUrl = '@web/uploads/support';
    protected $filesUploadDir = '@webroot/uploads/support';

    public $paths = [
        'backend' => [
            'namespace' => 'nikitakls\faq\controllers\backend',
            'uploadUrl' => '@web/uploads/faq',
            'uploadDir' => '@webroot/uploads/faq',
            'layout' => '@faq/views/backend/layouts/main',
            'views' => '@faq/views/backend/',
        ],
        'frontend' => [
            'namespace' => 'nikitakls\faq\controllers\frontend',
            'uploadUrl' => '@web/uploads/faq',
            'uploadDir' => '@webroot/uploads/faq',
            'layout' => '@faq/views/frontend/layouts/main',
            'views' => '@faq/views/frontend/',
        ],
    ];

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'nikitakls\faq\controllers\frontend';

    public function init()
    {

        $this->setAliases([
            '@faq' => __DIR__
        ]);

        if($this->isBackend){
            $cfg = $this->paths['backend'];
        } else {
            $cfg = $this->paths['frontend'];
        }
        $this->setViewPath($cfg['views']);
        $this->controllerNamespace = $cfg['namespace'];
        $this->filesUploadUrl = $cfg['uploadUrl'];
        $this->filesUploadDir = $cfg['uploadDir'];
        //$this->layout = $cfg['layout'];

        parent::init();
    }


    public function getAdminMenuItems()
    {
        if(!$this->isBackend){
            return [];
        }
        return                     [
            'label' => 'Faq',
            'icon' => 'support',
            'url' => '#',
            'items' => [
                ['label' => 'Faq', 'icon' => 'file-code-o', 'url' => ['/faq/answer'],],
                ['label' => 'Category', 'icon' => 'file-code-o', 'url' => ['/faq/category'],],
                ['label' => 'Hint', 'icon' => 'file-code-o', 'url' => ['/faq/hint'],],
                ['label' => 'Page', 'icon' => 'file-code-o', 'url' => ['/faq/page'],],
                ['label' => 'News', 'icon' => 'file-code-o', 'url' => ['/faq/news'],],
            ],
        ];
    }

    /**
     * Translate message
     * @param $message
     * @param array $params
     * @param null $language
     * @return mixed
     */
    public static function t($message, $params = [], $language = null)
    {
        return Yii::$app->getModule('faq')->translate($message, $params, $language);
    }

    /**
     * Translate message
     * @param $message
     * @param array $params
     * @param null $language
     * @return mixed
     */
    public static function translate($message, $params = [], $language = null)
    {
        return Yii::t('support', $message, $params, $language);
    }

}