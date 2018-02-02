<?php

namespace nikitakls\faq\models;

use nikitakls\faq\models\query\CategoryQuery;
use Zelenin\yii\behaviors\Slug;

/**
 * This is the model class for table "{{%faq_category}}".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $icon
 * @property int $status
 * @property int $type
 */
class Category extends \yii\db\ActiveRecord
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
                'class' => Slug::className(),
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
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'icon' => 'Icon',
            'status' => 'Status',
            'type' => 'Type',
        ];
    }

    public function create(){
        return true;
    }
}
