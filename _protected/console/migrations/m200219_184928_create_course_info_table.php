<?php

use yii\db\Migration;

/**
 * Handles the creation of table `course_info`.
 */
class m200219_184928_create_course_info_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('course_info', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'image' => $this->string(),
            'message' => $this->string(2048)->notNull(),
            'course_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('course_info-course', 'course_info', 'course_id', 'course', 'id', 'cascade', 'cascade');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('course_info');
    }
}
