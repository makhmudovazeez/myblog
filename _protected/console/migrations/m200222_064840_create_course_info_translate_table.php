<?php

use yii\db\Migration;

/**
 * Handles the creation of table `course_info_translate`.
 */
class m200222_064840_create_course_info_translate_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('course_info_translate', [
            'id' => $this->primaryKey(),
            'information' => $this->string()->notNull(),
            'course_info_id' => $this->integer()->notNull(),
            'lang_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('course_information-course_info_translate', 'course_info_translate', 'course_info_id', 'course_information', 'id', 'CASCADE', "CASCADE");
        $this->addForeignKey('lang-course_info_translate', 'course_info_translate', 'lang_id', 'lang', 'id', 'CASCADE', "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('course_info_translate');
    }
}
