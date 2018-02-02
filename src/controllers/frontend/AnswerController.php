<?php

namespace nikitakls\faq\controllers\frontend;

use nikitakls\faq\models\search\AnswerSearch;
use nikitakls\faq\models\search\CategorySearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * AnswerController implements the CRUD actions for Answer model.
 */
class AnswerController extends Controller
{

    /**
     * Lists all Answer models.
     * @throws NotFoundHttpException
     * @return mixed
     */
    public function actionIndex()
    {
        $categories = CategorySearch::getFaqLists();
        if (sizeof($categories) == 0) {
            throw new NotFoundHttpException('Not found');
        } else {
            $this->redirect(['list', 'slug' => current($categories)], 301);
        }
    }

    /**
     * Lists all Answer models.
     * @throws NotFoundHttpException
     * @return mixed
     */
    public function actionList($slug = null)
    {
        $category = CategorySearch::getCategoryBySlug($slug);
        if (is_null($category)) {
            throw new NotFoundHttpException('Not found');
        }

        $searchModel = new AnswerSearch();
        return $this->render('index', [
            'category' => $category,
            'categories' => CategorySearch::getFaqLists(false),
            'models' => $searchModel->search(Yii::$app->request->queryParams, $category->id),
        ]);
    }

}
