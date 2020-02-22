<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news_translate`.
 */
class m200222_064915_create_news_translate_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news_translate', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'message' => $this->string()->notNull(),
            'news_id' => $this->integer()->notNull(),
            'lang_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('news-news_translate', 'news_translate', 'news_id', 'news', 'id', 'CASCADE', "CASCADE");
        $this->addForeignKey('lang-news_translate', 'news_translate', 'lang_id', 'lang', 'id', 'CASCADE', "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news_translate');
    }
}
