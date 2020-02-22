<?php

use yii\db\Migration;

/**
 * Handles the creation of table `course_translate`.
 */
class m200222_064825_create_course_translate_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('course_translate', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'course_id' => $this->integer()->notNull(),
            'lang_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('course-course_translate', 'course_translate', 'course_id', 'category', 'id', 'CASCADE', "CASCADE");
        $this->addForeignKey('lang-course_translate', 'course_translate', 'lang_id', 'lang', 'id', 'CASCADE', "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('course_translate');
    }
}
