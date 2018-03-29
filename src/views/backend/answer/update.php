<?php

use nikitakls\faq\Faq;

/* @var $this yii\web\View */
/* @var $model nikitakls\faq\models\Answer */

$this->title = 'Update Answer: ' . $model->question;
$this->params['breadcrumbs'][] = ['label' => Faq::t('base', 'Answers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->question, 'url' => ['view', 'id' => $model->question]];
$this->params['breadcrumbs'][] = Faq::t('base', 'Update');
?>
<div class="answer-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
