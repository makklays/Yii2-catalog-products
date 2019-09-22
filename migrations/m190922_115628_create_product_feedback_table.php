<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_feedback}}`.
 */
class m190922_115628_create_product_feedback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_feedback}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11)->notNull(),
            'username' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'message' => $this->text(),
            'modified_at' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_feedback}}');
    }
}
