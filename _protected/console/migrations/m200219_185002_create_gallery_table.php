<?php

use yii\db\Migration;

/**
 * Handles the creation of table `gallery`.
 */
class m200219_185002_create_gallery_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('gallery', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
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
