<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%indicator_types}}`.
 */
class m210425_100015_create_indicator_types_table extends Migration
{
    private $table_name = '{{%indicator_types}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table_name, [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string()
        ]);


        $data = [
            ['name' => 'O3'],
            ['name' => 'NO2'],
            ['name' => 'SO2'],
            ['name' => 'PM10'],
            ['name' => 'PM2.5'],
        ];

        foreach ($data as $item){
            $this->insert($this->table_name,$item);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table_name);
    }
}
