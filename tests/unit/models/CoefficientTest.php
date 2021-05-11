<?php

namespace app\test\unit\models;

use app\models\Coefficient;

class CoefsTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    private $coef;

    protected function _before()
    {
        $this->coef = new Coefficient();
    }

    protected function _after()
    {
    }


    // tests
    public function testCoefficientQuantity()
    {
        $count = $this->coef->find()
            ->groupBy('indicator_type_id')
            ->count();

        expect($count)->equals(5);
    }

    public function testCountLevelQuantity()
    {
        $count = $this->coef->find()
            ->groupBy('level')
            ->count();

        expect($count)->equals(6);
    }

}