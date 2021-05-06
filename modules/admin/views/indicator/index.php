<?php

use app\models\IndicatorType;
use app\models\Laboratory;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Показники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicator-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Додати показник', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'date',
                'value' => function ($model) {
                    return date('h:i d-m-Y',$model->date);
                }
            ],
            [
                'attribute' => 'indicator_type_id',
                'value' => function ($model) {
                    return $model->indicatorType->name;
                }
            ],
            [
                'attribute' => 'laboratory_id',
                'value' => function ($model) {
                    return '[' . $model->laboratory->city . '] ' . $model->laboratory->street;
                }
            ],
            'value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
