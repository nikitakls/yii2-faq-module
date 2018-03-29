<?php

namespace nikitakls\faq\models;

use nikitakls\faq\Faq;
use nikitakls\faq\models\query\AnswerQuery;
use nikitakls\markdown\behaviors\MarkdownModelBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%faq_answer}}".
 * @author nikitakls
 *
 * @property int $id
 * @property int $category_id
 * @property string $question
 * @property string $answer
 * @property string $clean_answer
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Answer extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%faq_answer}}';
    }

    /**
     * @inheritdoc
     * @return AnswerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AnswerQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'question', 'status'], 'required'],
            [['category_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['answer', 'clean_answer'], 'string'],
            [['question'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => Faq::t('base', 'Category'),
            'question' => Faq::t('base', 'Question'),
            'answer' => Faq::t('base', 'Answer'),
            'clean_answer' => Faq::t('base', 'Answer'),
            'status' => Faq::t('base', 'Status'),
            'created_at' => Faq::t('base', 'Created'),
            'updated_at' => Faq::t('base', 'Updated'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimeBehavior::class,
            [
                'class' => MarkdownModelBehavior::class,
                'sourceAttribute' => 'answer',
                'destinationAttribute' => 'clean_answer',
            ],

        ];
    }

    /** @return string */
    public function getAnswer()
    {
        if (empty($this->clean_answer)) {
            return $this->answer;
        }
        return $this->clean_answer;

    }

}
