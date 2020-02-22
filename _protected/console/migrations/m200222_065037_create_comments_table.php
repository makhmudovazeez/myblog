<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 */
class m200222_065037_create_comments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'user_profile_id' => $this->integer()->notNull(),
            'message' => $this->string()->notNull(),
        ]);
        $this->addForeignKey('user_profile-comments', 'comments', 'user_profile_id', 'user_profile', 'id', 'NO ACTION', "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('comments');
    }
}
