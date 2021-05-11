<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\components\jobs\qualityIndex\IndicatorEvent;
use app\components\jobs\qualityIndex\Publisher;
use app\components\jobs\qualityIndex\QualityIndexSubscriber;
use yii\console\Controller;
use yii\console\ExitCode;


class NotifyController extends Controller
{

    public function actionIndex($type, $value)
    {
        $indicatorEvent = new IndicatorEvent();

        $publisher = new Publisher($type,$indicatorEvent);

        $qualityIndexSubscriber = new QualityIndexSubscriber();

        $indicatorEvent->subscribe($type, $qualityIndexSubscriber);

        $publisher->publish($value);

        return ExitCode::OK;
    }
}
