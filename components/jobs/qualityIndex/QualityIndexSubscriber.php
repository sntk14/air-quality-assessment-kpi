<?php


namespace app\components\jobs\qualityIndex;


use app\components\jobs\qualityIndex\interfaces\SubscriberInterface;
use app\components\services\QualityIndexService;
use app\models\QualityIndex;
use app\models\repositories\IndicatorRepository;

class QualityIndexSubscriber implements SubscriberInterface
{
    public function notify($value)
    {
        $model = new QualityIndex();
        $indicators = IndicatorRepository::getLastIndicatorsInLaboratory(1);
        $indicator = QualityIndexService::getIndices($indicators);

        $model->date = time();
        $model->value = $indicator;
        $model->laboratory_id = 1;

        if ($model->validate()) $model->save();
    }
}