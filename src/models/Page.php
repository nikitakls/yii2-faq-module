<?php

namespace nikitakls\faq\models;

use nikitakls\faq\models\query\PageQuery;
use nikitakls\markdown\behaviors\MarkdownModelBehavior;
use Zelenin\yii\behaviors\Slug;

/**
 * This is the model class for table "{{%faq_page}}".
 *
 * @property int $id
 * @property int $category_id
 * @property string $content
 * @property string $title
 * @property string $slug
 * @property string $clean_content
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Page extends \yii\db\ActiveRecord
{
    public $titleSlug;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%faq_page}}';
    }

    /**
     * @inheritdoc
     * @return PageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PageQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'status', 'title'], 'required'],
            [['category_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['content', 'clean_content', 'title', 'slug'], 'string'],
            [['slug'], 'unique'],
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
            'content' => 'Content',
            'clean_content' => 'Clean Content',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            [
                'class' => Slug::className(),
                'slugAttribute' => 'titleSlug',
                'attribute' => 'title',
                // optional params
                'ensureUnique' => true,
                'replacement' => '-',
                'lowercase' => true,
                'immutable' => false,
                // If intl extension is enabled, see http://userguide.icu-project.org/transforms/general.
                'transliterateOptions' => 'Russian-Latin/BGN; Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC;'
            ],
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

    public function beforeValidate()
    {
        if (empty($this->getAttribute('slug'))) {
            $this->slug = $this->titleSlug;
        }
        return true;
    }

    public function getContent()
    {
        if (empty($this->clean_content)) {
            return $this->content;
        }
        return $this->clean_content;
    }
}
