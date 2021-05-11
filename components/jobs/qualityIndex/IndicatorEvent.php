<?php


namespace app\components\jobs\qualityIndex;


use app\components\jobs\qualityIndex\interfaces\IndicatorEventInterface;
use app\components\jobs\qualityIndex\interfaces\SubscriberInterface;

class IndicatorEvent implements IndicatorEventInterface
{
    private $types = [];

    public function subscribe($indicatorTypeId, SubscriberInterface $subscriber)
    {
        $this->types['indicatorTypeIds'][] = $subscriber;
    }

    public function publish($typeIndicatorId, $value)
    {
        if(empty($this->types[$typeIndicatorId])) return;

        foreach ($this->types[$typeIndicatorId] as $subscriber){
            $subscriber->notify();
        }
    }
}