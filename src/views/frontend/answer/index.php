<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel nikitakls\faq\models\search\AnswerSearch */
/* @var $models \nikitakls\faq\models\Answer[] */
/* @var $categories \nikitakls\faq\models\Category[] */
/* @var $category \nikitakls\faq\models\Category */

$this->title = 'Answers - ' . Html::encode($category->title);
$this->params['breadcrumbs'][] = $category->title;
?>
<div class="answer-index">
    <?php Pjax::begin(); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">

        <div class="col-md-2">
            <div class="row">
                <?= \yii\bootstrap\Nav::widget(
                    [
                        'options' => ['class' => 'nav nav-pills nav-stacked'],
                        'items' => array_map(function ($item) use ($category) {
                            return [
                                'label' => '<i class="' . ($item->icon) . '"></i> ' . $item->title,
                                'url' => ['list', 'slug' => $item->slug],
                                'active' => $category->id == $item->id,
                                'encode' => false
                            ];
                        }, $categories),
                    ]
                ) ?>

            </div>
        </div>
        <div class="col-md-10">
            <?php if (sizeof($models) == 0): ?>
                <div class="alert alert-info">
                    Items not found.
                </div>
            <?php else: ?>
                <?= \yii\bootstrap\Collapse::widget([
                    'options' => ['class' => ''],
                    'encodeLabels' => false,
                    'items' => array_map(function (\nikitakls\faq\models\Answer $item) {
                        return [
                            'label' => '<i class="glyphicon glyphicon-chevron-right"></i> ' . $item->question,

                            'content' => $item->getAnswer(),
                            'contentOptions' => [],
                            'options' => ['class' => ''],
                            'itemToggleOptions' => [
                                'tag' => 'div',
                                'class' => 'custom-toggle',
                            ],
                        ];
                    }, $models),
                ]); ?>

            <?php endif; ?>
        </div>
    </div>
    <?php Pjax::end(); ?>

</div>
