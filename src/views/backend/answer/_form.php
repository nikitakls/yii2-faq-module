<?php

use nikitakls\faq\helpers\StatusHelper;
use nikitakls\faq\models\search\CategorySearch;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$editor = \Yii::$app->getModule('faq')->getEditor();

/* @var $this yii\web\View */
/* @var $model nikitakls\faq\models\Answer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="answer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(CategorySearch::getFaqLists(), ['prompt' => ' -- ']) ?>

    <?= $form->field($model, 'question')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer')->widget($editor['class'], $editor['options']) ?>

    <?= $form->field($model, 'status')->dropDownList(StatusHelper::getStatusList(), ['prompt' => ' -- ']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
