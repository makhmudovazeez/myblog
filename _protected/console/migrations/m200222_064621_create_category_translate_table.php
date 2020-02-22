<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category_translate`.
 */
class m200222_064621_create_category_translate_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('category_translate', [
            'id' => $this->primaryKey(),
            'type' => $this->string()-notNull(),
            'category_id' => $this->integer()->notNull(),
            'lang_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('category-category_translate', 'category_translate', 'category_id', 'category', 'id', 'CASCADE', "CASCADE");
        $this->addForeignKey('lang-category_translate', 'category_translate', 'lang_id', 'lang', 'id', 'CASCADE', "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('category_translate');
    }
}
