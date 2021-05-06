<?php

use app\models\IndicatorType;
use app\models\Laboratory;
use app\models\repositories\IndicatorTypeRepository;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Indicator */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indicator-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'indicator_type_id')
        ->dropDownList(ArrayHelper::map(IndicatorTypeRepository::getAll(),'id','name')) ?>

    <?= $form->field($model, 'laboratory_id')
        ->dropDownList(ArrayHelper::map(Laboratory::find()->all(),'id','street')) ?>

    <?= $form->field($model, 'value')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
