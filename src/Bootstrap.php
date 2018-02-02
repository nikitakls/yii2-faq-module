<?php

namespace nikitakls\faq;

use Yii;
use yii\base\BootstrapInterface;
use yii\console\Application as ConsoleApplication;

/**
 * Bootstrap class registers module and user application component. It also creates some url rules which will be applied
 * when UrlManager.enablePrettyUrl is enabled.
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @param yii\base\Application $app
     * @throws yii\base\InvalidConfigException
     */
    public function bootstrap($app)
    {
        if (!$app instanceof ConsoleApplication) {
            // get module 'faq'
            $module = $app->getModule('faq');

            // configure url rules
            $configUrlRule = [
                'class' => 'yii\web\GroupUrlRule',
                'prefix' => $module->urlPrefix,
                'rules' => $module->urlRules,
            ];

            // create rule
            $rule = Yii::createObject($configUrlRule);
            // add rule to urlManager
            $app->urlManager->addRules([$rule], false);

        }
    }

}