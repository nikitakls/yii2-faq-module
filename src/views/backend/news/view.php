<?php

use nikitakls\faq\Faq;
use nikitakls\faq\helpers\StatusHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model nikitakls\faq\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Faq::t('base', 'News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <p>
        <?= Html::a(Faq::t('base', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Faq::t('base', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Faq::t('base', 'Are you sure you want to delete this news?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'attribute' => 'category.title',
                    ],
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
        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'updated_at:datetime',
                    'created_at:datetime',
                ],
            ]) ?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title"><?= $model->title ?></h2>
        </div>
        <div class="panel-body">
            <?= $model->getContent() ?>
        </div>
    </div>
</div>
