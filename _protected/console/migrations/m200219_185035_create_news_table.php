<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m200219_185035_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'image' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'created_at' => $this->date(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news');
    }
}
