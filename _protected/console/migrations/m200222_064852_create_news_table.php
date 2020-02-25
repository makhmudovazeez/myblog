<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m200222_064852_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'image' => $this->string()->notNull(),
            'message' => $this->string()->notNull(),
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
