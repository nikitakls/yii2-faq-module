<?php

namespace nikitakls\faq\models;

use nikitakls\faq\models\query\NewsQuery;
use nikitakls\markdown\behaviors\MarkdownModelBehavior;

/**
 * This is the model class for table "{{%faq_news}}".
 *
 * @property int $id
 * @property int $category_id
 * @property string $content
 * @property string $clean_content
 * @property string $title
 * @property string $updated_at
 * @property string $created_at
 * @property int $status
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%faq_news}}';
    }

    /**
     * @inheritdoc
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'status', 'title'], 'required'],
            [['category_id', 'status'], 'integer'],
            [['content', 'title'], 'string'],
            [['updated_at', 'created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'category_id' => 'Category ID',
            'content' => 'Content',
            'updated_at' => 'Update At',
            'created_at' => 'Create At',
            'status' => 'Status',
        ];
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
                'sourceAttribute' => 'content',
                'destinationAttribute' => 'clean_content',
            ],

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }


    public function getContent()
    {
        if (empty($this->clean_content)) {
            return $this->content;
        }
        return $this->clean_content;
    }

}
