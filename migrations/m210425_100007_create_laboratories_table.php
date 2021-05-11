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

        $data = [
            ['city' => 'Київ', 'street' => 'Подільський'],
            ['city' => 'Київ', 'street' => 'Оболонський'],
            ['city' => 'Київ', 'street' => 'Дніпровський'],
            ['city' => 'Київ', 'street' => 'Святошинський'],
            ['city' => 'Київ', 'street' => 'Соломенський'],
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
