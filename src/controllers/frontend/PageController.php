<?php

namespace nikitakls\faq\controllers\frontend;

use nikitakls\faq\models\search\PageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * PageController implements the CRUD actions for Page model.
 * @author nikitakls
 */
class PageController extends Controller
{

    /**
     * Displays a single Page model.
     * @param string $slug
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($slug)
    {
        if (($model = (new PageSearch())->findBySlug($slug, true)) === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

}
