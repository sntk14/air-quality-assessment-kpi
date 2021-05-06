<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coefficient */

$this->title = 'Додати коефіцієнт';
$this->params['breadcrumbs'][] = ['label' => 'Coefficients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coefficient-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
