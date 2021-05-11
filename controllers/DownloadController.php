<?php

namespace app\controllers;


use app\components\services\download\factory\DownloadFactory;
use app\models\QualityIndex;
use yii\helpers\ArrayHelper;

class DownloadController extends CController
{
    public function actionIndex($type)
    {
        $factory = new DownloadFactory();

        $indicators = QualityIndex::find()->with(['laboratory'])->all();

        $content = array_map(function ($item) {
            $date = date('h:i d-m-Y',$item->date);
            $laboratoryName = $item->laboratory->street.' ['.$item->laboratory->city.']';
            return $date.' | '.$item->value.' | '.$laboratoryName."\n";
        }, $indicators);

        $file = $factory->getFile([
            'type' => $type,
            'content' => implode($content)
        ]);

        return $file->download();
    }
}
