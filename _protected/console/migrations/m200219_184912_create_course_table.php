<?php

use yii\db\Migration;

/**
 * Handles the creation of table `course`.
 */
class m200219_184912_create_course_table extends Migration
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
        $this->addForeignKey('category-course', 'course', 'category_id', 'category', 'id', 'cascade', 'cascade');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('course');
    }
}
