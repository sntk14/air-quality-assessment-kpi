<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%indicators}}`.
 */
class m210425_100042_create_indicators_table extends Migration
{
    private $table_name = '{{%indicators}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table_name, [
            'id' => $this->primaryKey()->unsigned(),
            'date' => $this->integer(),
            'indicator_type_id' => $this->integer()->unsigned(),
            'laboratory_id' => $this->integer()->unsigned(),
            'value' => $this->float()
        ]);

        $this->addForeignKey(
            'indicators-indicator_types_idx',
            $this->table_name,
            'indicator_type_id',
            'indicator_types',
            'id');

        $this->addForeignKey(
            'indicators-laboratory_idx',
            $this->table_name,
            'laboratory_id',
            'laboratories',
            'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table_name);
    }
}
