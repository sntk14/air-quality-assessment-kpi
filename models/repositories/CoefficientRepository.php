<?php
namespace app\models\repositories;

use app\models\Coefficient;

class CoefficientRepository extends Coefficient
{
    public static function getOneFor($id)
    {
        return static::find()
            ->where(['id' => $id])
            ->one();
    }

    public static function getAll()
    {
        return static::find()
            ->select('*')
            ->all();
    }
}