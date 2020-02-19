<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 */
class m200219_185117_create_comments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'user_profile_id' => $this->integer(),
            'name' => $this->string()->defaultValue("unnamed"),
            'message' => $this->string()->notNull(),
        ]);
        $this->addForeignKey('comments-user_profile', 'comments', 'user_profile_id', 'user_profile', 'id', 'no action', 'cascade');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('comments');
    }
}
