<?php

namespace nikitakls\faq\controllers\backend;

use nikitakls\faq\Module;
use yii\web\Controller;

/**
 * AnswerController implements the CRUD actions for Answer model.
 * @property Module $module
 */
class DefaultController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {

        return [
            'upload' => $this->module->getUploadAction(),
        ];
    }

    /**
     * Lists all Answer models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}
