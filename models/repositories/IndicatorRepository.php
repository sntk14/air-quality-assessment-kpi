<?php
namespace app\models\repositories;

use app\models\Indicator;

class IndicatorRepository extends Indicator
{
    public static function getLastIndicatorsInLaboratory($lab_id)
    {
        return self::find()
            ->select('max(id) as idx, laboratory_id,id')
            ->where(['laboratory_id' => $lab_id])
            ->orderBy(['id'=>SORT_DESC])
            ->groupBy('indicator_type_id')
            ->all();
    }
}