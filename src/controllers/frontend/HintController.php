<?php

namespace nikitakls\faq\controllers\frontend;

use nikitakls\faq\Faq;
use nikitakls\faq\models\Hint;
use nikitakls\faq\models\search\HintSearch;
use yii\web\Controller;

/**
 * HintController implements the CRUD actions for Hint model.
 * @author nikitakls
 */
class HintController extends Controller
{

    /**
     * Displays a single Hint model.
     * @param string $code
     * @return mixed
     */
    public function actionGet($code)
    {
        $model = HintSearch::findByCode($code);
        if (is_null($model)) {
            $model = new Hint([
                'title' => Faq::t('base', 'Not found.'),
                'clean_content' => Faq::t('base', 'Information has not been added yet.'),
            ]);
        }

        return $this->renderAjax('get', [
            'model' => $model,
        ]);
    }

}
