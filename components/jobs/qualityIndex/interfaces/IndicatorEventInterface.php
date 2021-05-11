<?php


namespace app\components\jobs\qualityIndex\interfaces;


interface IndicatorEventInterface
{
    public function publish($typeIndicatorId, $value);

    public function subscribe($IndicatorTypeIds, SubscriberInterface $subscriber);
}