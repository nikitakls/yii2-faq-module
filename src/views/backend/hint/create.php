<?php

use nikitakls\faq\Faq;

/* @var $this yii\web\View */
/* @var $model nikitakls\faq\models\Hint */

$this->title = Faq::t('base', 'Create hint');
$this->params['breadcrumbs'][] = ['label' => Faq::t('base', 'Hints'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hint-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
