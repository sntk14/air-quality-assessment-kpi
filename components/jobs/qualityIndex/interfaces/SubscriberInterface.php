<?php


namespace app\components\jobs\qualityIndex\interfaces;


interface SubscriberInterface
{
    public function notify($value);
}