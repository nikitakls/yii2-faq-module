<?php

use nikitakls\faq\Faq;

/* @var $this yii\web\View */
/* @var $model nikitakls\faq\models\Page */

$this->title = Faq::t('base', 'Create page');
$this->params['breadcrumbs'][] = ['label' => Faq::t('base', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
