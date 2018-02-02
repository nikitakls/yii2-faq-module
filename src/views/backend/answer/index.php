<?php

use nikitakls\faq\helpers\StatusHelper;
use nikitakls\faq\models\search\CategorySearch;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel nikitakls\faq\models\search\AnswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Answers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-index">

    <p>
        <?= Html::a('Create Answer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'question',
            [
                'attribute' => 'category_id',
                'format' => 'raw',
                'filter' => CategorySearch::getFaqLists(),
                'value' => function ($item) {
                    return $item->category->title;
                },
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
