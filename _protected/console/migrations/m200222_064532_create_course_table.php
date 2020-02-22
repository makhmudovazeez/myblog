<?php

use yii\db\Migration;

/**
 * Handles the creation of table `course`.
 */
class m200222_064532_create_course_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('course', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('category-course', 'course', 'category_id', 'category', 'id', 'CASCADE', "NO ACTION");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('course');
    }
}
