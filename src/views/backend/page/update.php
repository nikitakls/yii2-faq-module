<?php

use nikitakls\faq\Faq;

/* @var $this yii\web\View */
/* @var $model nikitakls\faq\models\Page */

$this->title = Faq::t('base', 'Update page') . ': ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Faq::t('base', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->title]];
$this->params['breadcrumbs'][] = Faq::t('base', 'Update');
?>
<div class="page-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
