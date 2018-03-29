<?php

namespace nikitakls\faq\models;

use nikitakls\faq\Faq;
use nikitakls\faq\models\query\HintQuery;
use nikitakls\markdown\behaviors\MarkdownModelBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%faq_hint}}".
 * @author nikitakls
 *
 * @property int $id
 * @property string $code
 * @property int $category_id
 * @property string $content
 * @property string $clean_content
 * @property string $updated_at
 * @property string $created_at
 * @property string $title
 * @property int $status
 */
class Hint extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%faq_hint}}';
    }

    /**
     * @inheritdoc
     * @return HintQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HintQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'category_id', 'status'], 'required'],
            [['category_id', 'status'], 'integer'],
            [['content'], 'string'],
            [['updated_at', 'created_at'], 'safe'],
            [['code', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Faq::t('base', 'ID'),
            'code' => Faq::t('base', 'Code'),
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

}
