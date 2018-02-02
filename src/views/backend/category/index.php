<?php

use yii\grid\GridView;
use yii\helpers\Html;
use nikitakls\faq\helpers\StatusHelper;
use nikitakls\faq\helpers\CategoryHelper;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel nikitakls\faq\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
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
                'filter' => StatusHelper::getStatusList(),
                'value' => function ($data){
                    return StatusHelper::statusLabel($data->status);
                }
            ],
            [
                'attribute' => 'type',
                'format' => 'raw',
                'filter' => CategoryHelper::getList(),
                'value' => function ($data){
                    return CategoryHelper::label($data->type);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
