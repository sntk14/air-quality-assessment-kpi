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
            'min' => $this->float(),
            'max' => $this->float(),
            'level' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk-coefficients-indicator_type_idx',
            $this->table_name,
            'indicator_type_id',
            'indicator_types',
            'id');

        $data = [
            ['indicator_type_id' => 1,
                'min' => 0,
                'max' => 50,
                'level' => 1
            ],
            ['indicator_type_id' => 1,
                'min' => 51,
                'max' => 100,
                'level' => 2
            ],
            ['indicator_type_id' => 1,
                'min' => 101,
                'max' => 130,
                'level' => 3
            ],
            ['indicator_type_id' => 1,
                'min' => 131,
                'max' => 240,
                'level' => 4
            ],
            ['indicator_type_id' => 1,
                'min' => 241,
                'max' => 380,
                'level' => 5
            ],
            ['indicator_type_id' => 1,
                'min' => 381,
                'max' => 800,
                'level' => 6
            ],

            ['indicator_type_id' => 2,
                'min' => 0,
                'max' => 40,
                'level' => 1
            ],
            ['indicator_type_id' => 2,
                'min' => 41,
                'max' => 90,
                'level' => 2
            ],
            ['indicator_type_id' => 2,
                'min' => 91,
                'max' => 120,
                'level' => 3
            ],
            ['indicator_type_id' => 2,
                'min' => 121,
                'max' => 230,
                'level' => 4
            ],
            ['indicator_type_id' => 2,
                'min' => 231,
                'max' => 340,
                'level' => 5
            ],
            ['indicator_type_id' => 2,
                'min' => 341,
                'max' => 100,
                'level' => 6
            ],

            ['indicator_type_id' => 3,
                'min' => 0,
                'max' => 100,
                'level' => 1
            ],
            ['indicator_type_id' => 3,
                'min' => 101,
                'max' => 200,
                'level' => 2
            ],
            ['indicator_type_id' => 3,
                'min' => 201,
                'max' => 350,
                'level' => 3
            ],
            ['indicator_type_id' => 3,
                'min' => 351,
                'max' => 500,
                'level' => 4
            ],
            ['indicator_type_id' => 3,
                'min' => 501,
                'max' => 750,
                'level' => 5
            ],
            ['indicator_type_id' => 3,
                'min' => 751,
                'max' => 1250,
                'level' => 6
            ],

            ['indicator_type_id' => 4,
                'min' => 0,
                'max' => 20,
                'level' => 1
            ],
            ['indicator_type_id' => 4,
                'min' => 21,
                'max' => 40,
                'level' => 2
            ],
            ['indicator_type_id' => 4,
                'min' => 41,
                'max' => 50,
                'level' => 3
            ],
            ['indicator_type_id' => 4,
                'min' => 51,
                'max' => 100,
                'level' => 4
            ],
            ['indicator_type_id' => 4,
                'min' => 101,
                'max' => 150,
                'level' => 5
            ],
            ['indicator_type_id' => 4,
                'min' => 151,
                'max' => 1200,
                'level' => 6
            ],

            ['indicator_type_id' => 5,
                'min' => 0,
                'max' => 10,
                'level' => 1
            ],
            ['indicator_type_id' => 5,
                'min' => 11,
                'max' => 20,
                'level' => 2
            ],
            ['indicator_type_id' => 5,
                'min' => 21,
                'max' => 25,
                'level' => 3
            ],
            ['indicator_type_id' => 5,
                'min' => 26,
                'max' => 50,
                'level' => 4
            ],
            ['indicator_type_id' => 5,
                'min' => 51,
                'max' => 75,
                'level' => 5
            ],
            ['indicator_type_id' => 5,
                'min' => 76,
                'max' => 800,
                'level' => 6
            ],
        ];

        foreach ($data as $item){
            $this->insert($this->table_name,$item);
        }
    }


    public function safeDown()
    {
        $this->dropTable($this->table_name);
    }
}
