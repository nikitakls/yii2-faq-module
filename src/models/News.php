<?php

namespace nikitakls\faq\models;

use nikitakls\faq\Faq;
use nikitakls\faq\models\query\NewsQuery;
use nikitakls\markdown\behaviors\MarkdownModelBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%faq_news}}".
 * @author nikitakls
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
class News extends ActiveRecord
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
            'id' => Faq::t('base', 'ID'),
            'title' => Faq::t('base', 'Title'),
            'category_id' => Faq::t('base', 'Category'),
            'content' => Faq::t('base', 'Content'),
            'updated_at' => Faq::t('base', 'Update'),
            'created_at' => Faq::t('base', 'Create'),
            'status' => Faq::t('base', 'Status'),
        ];
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

    /**
     * @return string
     */
    public function getContent()
    {
        if (empty($this->clean_content)) {
            return $this->content;
        }
        return $this->clean_content;
    }

}
