<?php

use nikitakls\faq\Faq;
use nikitakls\faq\helpers\StatusHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model nikitakls\faq\models\Hint */

$this->title = $model->code;
$this->params['breadcrumbs'][] = ['label' => Faq::t('base', 'Hints'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hint-view">

    <p>
        <?= Html::a(Faq::t('base', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Faq::t('base', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Faq::t('base', 'Are you sure you want to delete this hint?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'title',
            [
                'attribute' => 'category_id',
                'format' => 'raw',
                'value' => function ($item) {
                    return $item->category->title;
                },
            ],
            'content:ntext',
            'updated_at:date',
            'created_at:date',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($data) {
                    return StatusHelper::statusLabel($data->status);
                }
            ],
        ],
    ]) ?>

</div>
