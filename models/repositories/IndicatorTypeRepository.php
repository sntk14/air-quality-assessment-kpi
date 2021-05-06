<?php

namespace app\models\repositories;

use app\models\IndicatorType;

class IndicatorTypeRepository extends IndicatorType
{
    public static function getAll()
    {
        return self::find()
            ->select('*')
            ->all();
    }
}