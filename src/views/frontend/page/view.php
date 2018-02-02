<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model nikitakls\faq\models\Page */

$this->title = $model->title;
$this->params['breadcrumbs'][] = $model->title;
?>
<div class="page-view">

    <h1><?= Html::encode($model->title) ?></h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title"><?= $model->title ?></h2>
        </div>
        <div class="panel-body">
            <?= $model->getContent() ?>
        </div>
    </div>
</div>
