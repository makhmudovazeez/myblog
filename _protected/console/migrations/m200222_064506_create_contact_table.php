<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contact`.
 */
class m200222_064506_create_contact_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('contact', [
            'id' => $this->primaryKey(),
            'address' => $this->string(),
            'email' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
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
