<?php

use nikitakls\faq\Faq;
use nikitakls\faq\helpers\StatusHelper;
use nikitakls\faq\models\search\CategorySearch;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \nikitakls\faq\models\search\HintSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Faq::t('base', 'Hints');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hint-index">

    <p>
        <?= Html::a(Faq::t('base', 'Create hint'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'title',
            'code',
            [
                'attribute' => 'category_id',
                'format' => 'raw',
                'filter' => CategorySearch::getHintLists(),
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
                'filter' => StatusHelper::getStatusList(),
                'value' => function ($data) {
                    return StatusHelper::statusLabel($data->status);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
