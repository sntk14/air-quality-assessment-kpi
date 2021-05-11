<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%quality_indices}}`.
 */
class m210425_100041_create_quality_indices_table extends Migration
{
    private $table_name = '{{%quality_indices}}';

    public function safeUp()
    {
        $this->createTable($this->table_name, [
            'id' => $this->primaryKey(),
            'date' => $this->integer(),
            'laboratory_id' => $this->integer()->unsigned(),
            'value' => $this->float()
        ]);

        $this->addForeignKey(
            'laboratories_idx',
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
