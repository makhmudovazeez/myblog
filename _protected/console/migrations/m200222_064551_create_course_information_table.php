<?php

use yii\db\Migration;

/**
 * Handles the creation of table `course_information`.
 */
class m200222_064551_create_course_information_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('course_information', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'course_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('course-course_information', 'course_information', 'course_id', 'course', 'id', 'CASCADE', "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('course_information');
    }
}
