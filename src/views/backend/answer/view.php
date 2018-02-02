<?php

use nikitakls\faq\helpers\StatusHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model nikitakls\faq\models\Answer */

$this->title = $model->question;
$this->params['breadcrumbs'][] = ['label' => 'Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-view">

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

    <div class="row">
        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'label' => 'Category',
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
                    'created_at:datetime',
                    'updated_at:datetime',
                ],
            ]) ?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title"><?= $model->question ?></h2>
        </div>
        <div class="panel-body">
            <?= $model->getAnswer() ?>
        </div>
    </div>

</div>
