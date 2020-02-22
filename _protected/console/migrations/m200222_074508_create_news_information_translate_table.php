<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news_information_translate`.
 */
class m200222_074508_create_news_information_translate_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news_information_translate', [
            'id' => $this->primaryKey(),
            'information' => $this->string()->notNull(),
            'news_info_id' => $this->integer()->notNull(),
            'lang_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('news_information-news_information_translate', 'news_information_translate', 'news_info_id', 'news_information', 'id', 'CASCADE', "CASCADE");
        $this->addForeignKey('lang-news_information_translate', 'news_information_translate', 'lang_id', 'lang', 'id', 'CASCADE', "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news_information_translate');
    }
}
