<?php

use nikitakls\faq\Faq;
use nikitakls\faq\helpers\CategoryHelper;
use nikitakls\faq\helpers\StatusHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model nikitakls\faq\models\Category */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Faq::t('base', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <p>
        <?= Html::a(Faq::t('base', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Faq::t('base', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Faq::t('base', 'Are you sure you want to delete this category?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'slug',
            [
                'attribute' => 'icon',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<i class="' . $data->icon . '"></i>';
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($data) {
                    return StatusHelper::statusLabel($data->status);
                }
            ],
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function ($data) {
                    return CategoryHelper::label($data->type);
                }
            ],
        ],
    ]) ?>

</div>
