<?php

namespace app\test\unit\services;

use app\components\services\QualityIndexService;
use app\models\Coefficient;

class QualityIndexTest extends \Codeception\Test\Unit
{

    public function testGetBest()
    {
        $best = QualityIndexService::getBest();
        expect($best)->equals(0);
    }

    public function testGetWorse()
    {
        $worse = QualityIndexService::getWorse();
        expect($worse)->equals(830);
    }
}