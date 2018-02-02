<?php

use nikitakls\faq\helpers\StatusHelper;
use nikitakls\faq\models\search\CategorySearch;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel nikitakls\faq\models\search\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = ['label' => 'Faq', 'url' => ['/faq']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <p>
        <?= Html::a('Create Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            [
                'attribute' => 'category_id',
                'format' => 'raw',
                'filter' => CategorySearch::getPageLists(),
                'value' => 'category.title',
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'filter' => StatusHelper::getStatusList(),
                'value' => function ($data) {
                    return StatusHelper::statusLabel($data->status);
                }
            ],
            'created_at:datetime',
            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
