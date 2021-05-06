<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m210425_100354_create_users_table extends Migration
{
    private $table_name = '{{%users}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table_name, [
            'id' => $this->primaryKey()->unsigned(),
            'ip' => $this->string(),
            'password' => $this->string(),
            'name' => $this->string(),
            'login' => $this->string(),
            'auth_token' => $this->string()->unique()->notNull(),
            'auth_key' => $this->string()->unique()->notNull(),
        ]);

        $this->insert($this->table_name,[
            'ip' => '127.0.0.1',
            'name' => 'alex',
            'login' => 'admin',
            'password' => Yii::$app->security->generatePasswordHash('pass'),
            'auth_token' => Yii::$app->security->generateRandomString(),
            'auth_key' => Yii::$app->security->generateRandomString(30)
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
