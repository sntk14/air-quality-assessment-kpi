<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coefficient */

$this->title = 'Обновити коефіцієнт: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Coefficients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coefficient-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
