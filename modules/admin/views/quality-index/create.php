<?php

use app\models\Laboratory;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QualityIndex */

$this->title = 'Додати оцінку якості повітря';
$this->params['breadcrumbs'][] = ['label' => 'Quality Indices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quality-index-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'laboratory_id')
        ->dropDownList(ArrayHelper::map(Laboratory::find()->all(),'id','street')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
