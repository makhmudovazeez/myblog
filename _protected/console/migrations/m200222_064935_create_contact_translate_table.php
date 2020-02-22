<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contact_translate`.
 */
class m200222_064935_create_contact_translate_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('contact_translate', [
            'id' => $this->primaryKey(),
            'address' => $this->string()->notNull(),
            'contact_id' => $this->integer()->notNull(),
            'lang_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('news-contact_translate', 'contact_translate', 'contact_id', 'contact', 'id', 'CASCADE', "CASCADE");
        $this->addForeignKey('lang-contact_translate', 'contact_translate', 'lang_id', 'lang', 'id', 'CASCADE', "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('contact_translate');
    }
}
