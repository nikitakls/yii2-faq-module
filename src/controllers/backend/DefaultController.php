<?php

namespace nikitakls\faq\controllers\backend;

use yii\web\Controller;

/**
 * AnswerController implements the CRUD actions for Answer model.
 */
class DefaultController extends Controller
{

    /**
     * Lists all Answer models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}
