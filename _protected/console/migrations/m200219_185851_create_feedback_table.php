<?php

use yii\db\Migration;

/**
 * Handles the creation of table `feedback`.
 */
class m200219_185851_create_feedback_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('feedback', [
            'id' => $this->primaryKey(),
            'user_profile_id' => $this->integer(),
            'name' => $this->string()->defaultValue("unnamed"),
            'message' => $this->string(1024)->notNull(),
            'course_id' => $this->integer(),
        ]);
        $this->addForeignKey('course-feedback', 'feedback', 'course_id', 'course', 'id', 'no action', 'cascade');
        $this->addForeignKey('user_profile-feedback', 'feedback', 'user_profile_id', 'user_profile', 'id', 'no action', 'cascade');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('feedback');
    }
}
