<?php

use yii\db\Migration;

/**
 * Class m180122_124330_create_table_billing
 */
class m180130_124330_init extends Migration
{

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%faq_category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'icon' => $this->string(255),
            'status' => $this->smallInteger()->notNull(),
            'type' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%faq_answer}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'question' => $this->string(255)->notNull(),
            'answer' => $this->text(),
            'clean_answer' => $this->text(),
            'status' => $this->smallInteger()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%faq_page}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'slug' => $this->string()->notNull(),
            'content' => 'MEDIUMTEXT',
            'clean_content' => 'MEDIUMTEXT',
            'status' => $this->smallInteger()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%faq_hint}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(255)->notNull(),
            'category_id' => $this->integer()->notNull(),
            'content' => $this->text(),
            'update_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'create_at' => $this->timestamp()->defaultValue(null),
            'status' => $this->smallInteger()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%faq_news}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'content' => 'MEDIUMTEXT',
            'update_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'create_at' => $this->timestamp()->defaultValue(null),
            'status' => $this->smallInteger()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%faq_category}}');
        $this->dropTable('{{%faq_answer}}');
        $this->dropTable('{{%faq_hint}}');
        $this->dropTable('{{%faq_page}}');
        $this->dropTable('{{%faq_news}}');
    }
}
