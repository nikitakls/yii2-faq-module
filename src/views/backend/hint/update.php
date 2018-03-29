<?php

use nikitakls\faq\Faq;

/* @var $this yii\web\View */
/* @var $model nikitakls\faq\models\Hint */

$this->title = Faq::t('base', 'Update hint');
$this->params['breadcrumbs'][] = ['label' => Faq::t('base', 'Hints'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Faq::t('base', 'Update');
?>
<div class="hint-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
