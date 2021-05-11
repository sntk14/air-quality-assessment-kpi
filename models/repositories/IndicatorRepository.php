<?php

namespace app\models\repositories;

use app\models\Indicator;

class IndicatorRepository extends Indicator
{
    public static function getLastIndicatorsInLaboratory($lab_id)
    {
        $indxs =  (new \yii\db\Query())
            ->select(['max(id) as id'])
            ->from('indicators')
            ->where(['laboratory_id' => $lab_id])
            ->groupBy('indicator_type_id')
            ->all();

        return self::find()
            ->select(['id', 'laboratory_id','indicator_type_id','value'])
            ->where(['in', 'id', array_map(function ($item){return $item['id'];},$indxs)])
            ->all();
    }
}