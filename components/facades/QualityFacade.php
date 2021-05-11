<?php

namespace app\components\facades;
use app\components\services\QualityIndexService;

class QualityFacade
{
    public static function getPercent($current)
    {
        $max = QualityIndexService::getWorse();

        $qualityIndex = QualityIndexService::getPercent($current,$max);
         return round($qualityIndex,2).'%';
    }
}