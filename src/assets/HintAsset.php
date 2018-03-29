<?php

namespace nikitakls\faq\assets;


use yii\web\AssetBundle;

/**
 * @author nikitakls
 */
class HintAsset extends AssetBundle
{
    public $sourcePath = '@vendor/nikitakls/yii2-faq-module/src/assets/source';

    public $js = [
        'js/hint.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}