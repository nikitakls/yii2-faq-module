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
        $jsonField = $this->text();
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            $jsonField = 'JSON';
        }

        $this->createTable('{{%faq_category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'icon' => $this->string(255),
            'status' => $this->smallInteger()->notNull(),
            'type' => $this->integer()->notNull(),
            'meta' => $jsonField,
        ], $tableOptions);
        $this->createIndex('{{%idx-faq_category-slug-status}}', '{{%faq_category}}', ['slug', 'status']);
        $this->createIndex('{{%idx-faq_category-type-status}}', '{{%faq_category}}', ['type', 'status']);

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
        $this->createIndex('{{%idx-faq_answer-category-status}}', '{{%faq_answer}}', ['category_id', 'status']);

        $this->createTable('{{%faq_page}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'slug' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'content' => 'MEDIUMTEXT',
            'clean_content' => 'MEDIUMTEXT',
            'status' => $this->smallInteger()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'meta' => $jsonField,
        ], $tableOptions);
        $this->createIndex('{{%idx-faq_page-category-status}}', '{{%faq_page}}', ['category_id', 'status']);
        $this->createIndex('{{%idx-faq_page-slug-status}}', '{{%faq_page}}', ['slug', 'status']);
        $this->createIndex('{{%idx-faq_page-title}}', '{{%faq_page}}', ['title']);

        $this->createTable('{{%faq_hint}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(255)->notNull(),
            'category_id' => $this->integer()->notNull(),
            'content' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->smallInteger()->notNull(),
        ], $tableOptions);
        $this->createIndex('{{%idx-faq_hint-category-status}}', '{{%faq_hint}}', ['category_id', 'status']);
        $this->createIndex('{{%idx-faq_hint-code-status}}', '{{%faq_hint}}', ['code', 'status']);

        $this->createTable('{{%faq_news}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'title' => $this->string(),
            'content' => 'MEDIUMTEXT',
            'clean_content' => 'MEDIUMTEXT',
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->smallInteger()->notNull(),
            'meta' => $jsonField,
        ], $tableOptions);
        $this->createIndex('{{%idx-faq_news-category-status}}', '{{%faq_news}}', ['category_id', 'status']);
        $this->createIndex('{{%idx-faq_news-category-created}}', '{{%faq_news}}', ['created_at', 'status']);
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
