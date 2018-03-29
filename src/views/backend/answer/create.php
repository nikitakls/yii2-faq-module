<?php

use nikitakls\faq\Faq;

/* @var $this yii\web\View */
/* @var $model nikitakls\faq\models\Answer */

$this->title = Faq::t('base', 'Create answer');
$this->params['breadcrumbs'][] = ['label' => Faq::t('base', 'Answers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-create">

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
