<?php

use nikitakls\faq\Faq;

/* @var $this yii\web\View */
/* @var $model nikitakls\faq\models\Category */

$this->title = Faq::t('base', 'Create category');
$this->params['breadcrumbs'][] = ['label' => Faq::t('base', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
