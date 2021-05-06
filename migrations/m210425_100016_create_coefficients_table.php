<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%coefficients}}`.
 */
class m210425_100016_create_coefficients_table extends Migration
{
    private $table_name = '{{%coefficients}}';


    public function safeUp()
    {
        $this->createTable($this->table_name, [
            'id' => $this->primaryKey()->unsigned(),
            'indicator_type_id' => $this->integer()->unsigned(),
            'value' => $this->float()
        ]);

        $this->addForeignKey(
            'fk-coefficients-indicator_type_idx',
            $this->table_name,
            'indicator_type_id',
            'indicator_types',
            'id');
    }


    public function safeDown()
    {
        $this->dropTable($this->table_name);
    }
}
