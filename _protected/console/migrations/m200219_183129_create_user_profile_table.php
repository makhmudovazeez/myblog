<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_profile`.
 */
class m200219_183129_create_user_profile_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_profile', [
            'id' => $this->primaryKey(),
            'user_id' =>$this->integer()->notNull()->unique(),
            'first' =>$this->string()->notNull(),
            'last' =>$this->string()->notNull(),
            'middle' =>$this->string()->notNull(),
            'address' =>$this->string(),
            'phone' =>$this->string()->notNull(),
            'image' => $this->string(),
        ]);
        $this->addForeignKey('user_profile-user', 'user_profile', 'user_id', 'user', 'id', 'cascade', 'cascade');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_profile');
    }
}
