<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news_information`.
 */
class m200222_074445_create_news_information_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news_information', [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer()->notNull(),
            'image' => $this->string(),
            'information' => $this->string()->notNull(),
        ]);
        $this->addForeignKey('news-news_information', 'news_information', 'news_id', 'news', 'id', 'CASCADE', "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news_information');
    }
}
