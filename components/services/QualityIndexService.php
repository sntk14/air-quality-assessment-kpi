<?php

namespace app\components\services;

use app\models\Coefficient;

class QualityIndexService
{

    public static function getIndices($data)
    {
        $accum = 0;
        foreach ($data as $item) {
            $accum += $item->value;
        }
        return $accum / count($data);
    }

    public static function getWorse()
    {
        $coefficients = (new Coefficient())->getMaxCoefficients();
        $max = 0;
        foreach ($coefficients as $coefficient){
            $max += $coefficient->max;
        }

        return $max/count($coefficients);
    }

    public static function getBest()
    {
        $coefficientRep = new Coefficient();
        $coefficients = $coefficientRep->getMinCoefficients();
        $min = 0;
        foreach ($coefficients as $coefficient){
            $min += $coefficient->min;
        }

        return $min/count($coefficients);
    }


    public static function getPercent($current, $max){
        return 100*$current/$max;
    }
}