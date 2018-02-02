<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use nikitakls\faq\helpers\StatusHelper;
use nikitakls\faq\helpers\CategoryHelper;

/* @var $this yii\web\View */
/* @var $model nikitakls\faq\models\Category */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
                'value' => function ($data){
                    return '<i class="'.$data->icon.'"></i>';
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($data){
                    return StatusHelper::statusLabel($data->status);
                }
            ],
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function ($data){
                    return CategoryHelper::label($data->type);
                }
            ],
        ],
    ]) ?>

</div>
