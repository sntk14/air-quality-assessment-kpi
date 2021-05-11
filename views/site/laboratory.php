<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $data \yii\db\ActiveRecord */

use app\components\facades\QualityFacade;
use dosamigos\chartjs\ChartJs;
use kartik\grid\GridView;

$this->title = $name;
?>
<h4>Відсоток якості повітря зараз:</h4>
<h3><?= QualityFacade::getPercent(array_pop($dataProvider->models)->value) ?></h3>
<div class="site">
    <?= ChartJs::widget([
        'type' => 'line',
        'options' => [
            'height' => 400,
            'width' => 800
        ],
        'data' => [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => "My First dataset",
                    'backgroundColor' => "rgba(179,181,198,0.2)",
                    'borderColor' => "rgba(179,181,198,1)",
                    'pointBackgroundColor' => "rgba(179,181,198,1)",
                    'pointBorderColor' => "#fff",
                    'pointHoverBackgroundColor' => "#fff",
                    'pointHoverBorderColor' => "rgba(179,181,198,1)",
                    'data' => $data
                ]
            ]
        ]
    ]);
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'date',
                'value' => function ($model) {
                    return date('h-i d-m-Y', $model->date);
                }
            ],
            'value',
        ],
    ]); ?>
</div>
