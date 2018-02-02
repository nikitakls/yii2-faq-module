<?php

namespace nikitakls\faq\models;

use nikitakls\faq\models\query\AnswerQuery;
use nikitakls\markdown\behaviors\MarkdownModelBehavior;

/**
 * This is the model class for table "{{%faq_answer}}".
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
class Answer extends \yii\db\ActiveRecord
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
            'category_id' => 'Category ID',
            'question' => 'Question',
            'answer' => 'Answer',
            'clean_answer' => 'Clean Answer',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
            TimeBehavior::className(),
            [
                'class' => MarkdownModelBehavior::className(),
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
