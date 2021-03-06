<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m200222_064523_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'created_at' => $this->timestamp(), 
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('category');
    }
}
