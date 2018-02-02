<?php

namespace nikitakls\faq;

use nikitakls\markdown\actions\UploadFileAction;
use nikitakls\markdown\EditorMdWidget;
use Yii;
use yii\base\Module as BaseModule;
use yii\helpers\Url;

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
        'answer/<action:(create|index|update|delete|view)>' => 'answer/<action>',
        'answer/<slug:[\wd\-]+>' => 'answer/list',
        'page/<action:(create|index|update|delete|view)>' => 'page/<action>',
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
        'options' => [
            'language' => 'ru',
            'options' => [// html attributes
                'id' => 'editor-markdown',
                'class' => 'md-editor'
            ],
            'clientOptions' => [
                'height' => '450',
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
                'imageUploadURL' => '/default/upload',
                'toolbarIcons' => [
                    "undo", "redo", "|",
                    "bold", "del", "italic", "quote", "ucwords", "uppercase", "lowercase", "|",
                    "h1", "h2", "h3", "h4", "h5", "h6", "|",
                    "list-ul", "list-ol", "hr", "|",
                    "link", "reference-link", "image", "code", "preformatted-text", "code-block", "table", "datetime",
                    "html-entities", "|",
                    "goto-line", "watch", "preview", "fullscreen", "clear", "search", "|",
                    //"help", "info", "pagebreak", "emoji",
                ],
            ]
        ],

    ];

    public $paths = [
        'backend' => [
            'namespace' => 'nikitakls\faq\controllers\backend',
            'layout' => '@faq/views/backend/layouts/main',
            'views' => '@faq/views/backend/',
        ],
        'frontend' => [
            'namespace' => 'nikitakls\faq\controllers\frontend',
            'layout' => '@faq/views/frontend/layouts/main',
            'views' => '@faq/views/frontend/',
        ],
    ];

    public $uploadAction = [
        'class' => UploadFileAction::class,
        'url' => '@fileUrl/origin/puzzle/',
        'path' => '@filePath/origin/puzzle/',
        'thumbPath' => '@filePath/thumb/puzzle/',
        'thumbUrl' => '@fileUrl/thumb/puzzle/',
        'thumbs' => [
            'puzzle' => [
                'width' => 480,
                'height' => 320,
                'main' => true
            ],
        ],
        'unique' => true,
        'validatorOptions' => [
            'maxWidth' => 4000,
            'maxHeight' => 2000
        ]
    ];

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'nikitakls\faq\controllers\frontend';

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

    public function init()
    {

        $this->setAliases([
            '@faq' => __DIR__
        ]);

        if ($this->isBackend) {
            $cfg = $this->paths['backend'];
        } else {
            $cfg = $this->paths['frontend'];
        }
        $this->setViewPath($cfg['views']);
        $this->controllerNamespace = $cfg['namespace'];
        //$this->layout = $cfg['layout'];

        parent::init();
    }

    public function getAdminMenuItems()
    {
        if (!$this->isBackend) {
            return [];
        }
        return [
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

    public function getEditor()
    {
        $options = $this->editor;
        $options['options']['clientOptions']['imageUploadURL'] = Url::to('/' . $this->urlPrefix . $options['options']['clientOptions']['imageUploadURL']);
        return $options;
    }

    public function getUploadAction()
    {
        return $this->uploadAction;
    }

}