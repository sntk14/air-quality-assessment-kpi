<?php

use app\components\services\QualityIndexService;
use app\models\repositories\IndicatorRepository;
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


        $start = 1609452001;

        for($i = $start; $i < time(); $i+=3600){
            $laboratoryId = rand(1,\app\models\Laboratory::find()->count());

            $this->insert($this->table_name,[
                'date' => $i,
                'indicator_type_id' => 1,
                'laboratory_id' => $laboratoryId,
                'value' => rand(0,800)
            ]);
            $this->insert($this->table_name,[
                'date' => $i,
                'indicator_type_id' => 2,
                'laboratory_id' => $laboratoryId,
                'value' => rand(0,1000)
            ]);
            $this->insert($this->table_name,[
                'date' => $i,
                'indicator_type_id' => 3,
                'laboratory_id' => $laboratoryId,
                'value' => rand(0,1250)
            ]);
            $this->insert($this->table_name,[
                'date' => $i,
                'indicator_type_id' => 4,
                'laboratory_id' => $laboratoryId,
                'value' => rand(0,1200)
            ]);
            $this->insert($this->table_name,[
                'date' => $i,
                'indicator_type_id' => 5,
                'laboratory_id' => $laboratoryId,
                'value' => rand(0,800)
            ]);

            $indicators = IndicatorRepository::getLastIndicatorsInLaboratory($laboratoryId);
            $indicator = QualityIndexService::getIndices($indicators);
            $this->insert('quality_indices',[
                'date' => $i,
                'laboratory_id' => $laboratoryId,
                'value' => $indicator
            ]);
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
