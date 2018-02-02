<?php

/* @var $this yii\web\View */
/* @var $model nikitakls\faq\models\Page */

$this->title = 'Update Page: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->title]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="page-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
