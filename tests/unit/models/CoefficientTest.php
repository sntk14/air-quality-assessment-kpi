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
        $count = $this->coef->find()->count();
        expect($count)->equals(1);
    }
}