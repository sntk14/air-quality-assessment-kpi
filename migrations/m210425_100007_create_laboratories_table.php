<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%laboratories}}`.
 */
class m210425_100007_create_laboratories_table extends Migration
{
    private $table_name = '{{%laboratories}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table_name, [
            'id' => $this->primaryKey()->unsigned(),
            'city' => $this->string(),
            'street' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table_name);
    }
}
