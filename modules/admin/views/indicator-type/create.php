<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IndicatorType */

$this->title = 'Додати тип показника';
$this->params['breadcrumbs'][] = ['label' => 'Indicator Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicator-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
