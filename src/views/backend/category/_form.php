<?php

use nikitakls\faq\Faq;
use nikitakls\faq\helpers\CategoryHelper;
use nikitakls\faq\helpers\StatusHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model nikitakls\faq\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icon')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(StatusHelper::getStatusList(), ['prompt' => ' -- ']) ?>

    <?= $form->field($model, 'type')->dropDownList(CategoryHelper::getList(), ['prompt' => ' -- ']) ?>

    <div class="form-group">
        <?= Html::submitButton(Faq::t('base', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
