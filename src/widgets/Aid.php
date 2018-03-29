<?php

namespace nikitakls\faq\widgets;

use nikitakls\faq\assets\HintAsset;
use yii\bootstrap\Widget;

/**
 * Class Aid
 * @package nikitakls\faq\widgets
 * @author nikitakls
 */
class Aid extends Widget
{
    /**
     * Unique string for getting help
     * @var string
     */
    public $code;

    /**
     * @var array the options for rendering the close button tag.
     * Array will be passed to [[\yii\bootstrap\Alert::closeButton]].
     */
    public $closeButton = [];

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $this->registerAssets();
        return '<i class="faq-hint glyphicon glyphicon-question-sign" style="cursor: pointer;" data-code="' . $this->code . '"></i>';
    }

    protected function registerAssets()
    {
        $view = $this->getView();
        HintAsset::register($view);
    }

}