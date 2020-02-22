<?php

use yii\db\Migration;

/**
 * Handles the creation of table `feedback`.
 */
class m200222_064951_create_feedback_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('feedback', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'message' => $this->string(1024)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('feedback');
    }
}
