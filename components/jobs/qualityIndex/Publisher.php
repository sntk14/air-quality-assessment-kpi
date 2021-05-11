<?php


namespace app\components\jobs\qualityIndex;


use app\components\jobs\qualityIndex\interfaces\IndicatorEventInterface;
use app\components\jobs\qualityIndex\interfaces\PublisherInterface;

class Publisher implements PublisherInterface
{
    private $typeId;
    private $eventChannel;

    public function __construct($typeId, IndicatorEventInterface $indicatorEvent)
    {
        $this->typeId = $typeId;
        $this->eventChannel = $indicatorEvent;
    }

    public function publish($data)
    {
       $this->eventChannel->publish($this->typeId,$data);
    }
}