<?php
/**
 * TimeBehavior.php
 * User: nikitakls
 * Date: 02.02.18
 * Time: 16:16
 */

namespace nikitakls\faq\models;


use yii\base\Behavior;
use yii\db\ActiveRecord;

class TimeBehavior extends Behavior
{
    /**
     * @var string create time attribute name
     */
    public $createAttribute = 'created_at';

    /**
     * @var string create time attribute name
     */
    public $updateAttribute = 'updated_at';

    /**
     * @inheritdoc
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
        ];
    }


    /**
     * @return void
     */
    public function beforeInsert()
    {
        $this->owner->{$this->createAttribute} = time();
    }

    /**
     * @return void
     */
    public function beforeUpdate()
    {
        $this->owner->{$this->updateAttribute} = time();
    }

}