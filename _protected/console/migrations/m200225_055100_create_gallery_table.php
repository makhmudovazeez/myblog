<?php

use yii\db\Migration;

/**
 * Handles the creation of table `gallery`.
 */
class m200225_055100_create_gallery_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('gallery', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'size' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('gallery');
    }
}
