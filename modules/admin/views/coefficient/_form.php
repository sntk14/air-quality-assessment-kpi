<?php

use app\models\repositories\IndicatorTypeRepository;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Coefficient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coefficient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'indicator_type_id')
        ->dropDownList(ArrayHelper::map(IndicatorTypeRepository::getAll(),'id','name')) ?>

    <?= $form->field($model, 'min')->textInput() ?>
    <?= $form->field($model, 'max')->textInput() ?>
    <?= $form->field($model, 'level')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
