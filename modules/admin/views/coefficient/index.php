<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Коефіцієнти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coefficient-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Додати коефіцієнт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'indicator_type_id',
                'value' => function ($model) {
                    return $model->indicatorType->name;
                }
            ],
            'min',
            'max',
            'level',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
