<?php

use nikitakls\faq\Faq;
use nikitakls\faq\helpers\StatusHelper;
use nikitakls\faq\models\search\CategorySearch;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel nikitakls\faq\models\search\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Faq::t('base', 'News');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <p>
        <?= Html::a(Faq::t('base', 'Create news'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'title',
            [
                'attribute' => 'category_id',
                'format' => 'raw',
                'filter' => CategorySearch::getNewsLists(),
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
            'updated_at:datetime',
            'created_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
