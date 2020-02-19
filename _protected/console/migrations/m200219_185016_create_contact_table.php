<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contact`.
 */
class m200219_185016_create_contact_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('contact', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'address' => $this->string(),
            'facebook' => $this->string(),
            'instagram' => $this->string(),
            'twitter' => $this->string(),
            'telegram' => $this->string(),
           
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('contact');
    }
}
