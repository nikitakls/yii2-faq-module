<?php

namespace nikitakls\faq\models;

use nikitakls\faq\Faq;
use nikitakls\faq\models\query\CategoryQuery;
use yii\db\ActiveRecord;
use Zelenin\yii\behaviors\Slug;

/**
 * This is the model class for table "{{%faq_category}}".
 * @author nikitakls
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $icon
 * @property int $status
 * @property int $type
 */
class Category extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%faq_category}}';
    }

    /**
     * @inheritdoc
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'status', 'type'], 'required'],
            [['status', 'type'], 'integer'],
            [['title', 'slug', 'icon'], 'string', 'max' => 255],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => Slug::class,
                'slugAttribute' => 'slug',
                'attribute' => 'title',
                // optional params
                'ensureUnique' => true,
                'replacement' => '-',
                'lowercase' => true,
                'immutable' => false,
                // If intl extension is enabled, see http://userguide.icu-project.org/transforms/general.
                'transliterateOptions' => 'Russian-Latin/BGN; Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC;'
            ],
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
            'slug' => Faq::t('base', 'Slug'),
            'icon' => Faq::t('base', 'Icon'),
            'status' => Faq::t('base', 'Status'),
            'type' => Faq::t('base', 'Type'),
        ];
    }

    public function create()
    {
        return true;
    }
}
