<?php

/* @var $this yii\web\View */
/* @var $model nikitakls\faq\models\Answer */

$this->title = 'Update Answer: ' . $model->question;
$this->params['breadcrumbs'][] = ['label' => 'Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->question, 'url' => ['view', 'id' => $model->question]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="answer-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
