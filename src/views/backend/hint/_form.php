<?php

use nikitakls\faq\Faq;
use nikitakls\faq\helpers\StatusHelper;
use nikitakls\faq\models\search\CategorySearch;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model nikitakls\faq\models\Hint */
/* @var $form yii\widgets\ActiveForm */
$editor = \Yii::$app->getModule('faq')->getEditor();
?>

<div class="hint-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(CategorySearch::getHintLists(), ['prompt' => ' -- ']) ?>

    <?= $form->field($model, 'content')->widget($editor['class'], $editor['options']) ?>

    <?= $form->field($model, 'status')->dropDownList(StatusHelper::getStatusList(), ['prompt' => ' -- ']) ?>

    <div class="form-group">
        <?= Html::submitButton(Faq::t('base', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
