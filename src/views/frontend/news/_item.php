<?php

/* @var $this yii\web\View */
/* @var $model \nikitakls\faq\models\News */
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="pull-right">
            <?= Yii::$app->formatter->asDate($model->created_at) ?>
        </div>
        <h3 class="panel-title"><?= $model->title ?></h3>
    </div>
    <div class="panel-body">
        <?= $model->getContent() ?>
    </div>
</div>
