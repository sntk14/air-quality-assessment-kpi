<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'Оцінка якості повітря';
?>
<div class="site-index">

    <div class="body-content">
        <?php $types = ['txt','pdf'] ?>
        <?php foreach ($types as $type): ?>
            <?= Html::a("<button class='btn btn-primary'>".$type."</button>",
                ['/download/index', 'type' => $type, ['class' => 'btn btn-primary']]) ?>
        <?php endforeach; ?>

        <div id="labs_list">
            <?php foreach ($laboratories as $laboratory): ?>
                <?= Html::a("<button style='margin: 5px' class='btn btn-success'>".$laboratory->street.' ['.$laboratory->city.']'."</button>",
                    ['/site/laboratory', 'id' => $laboratory->id, ['class' => 'btn btn-primary']]) ?>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <?php
            Pjax::begin([
                'enableReplaceState' => false,
                'enablePushState' => false,
                'timeout' => false,
                'linkSelector' => '#labs_list a'
            ]);

            ?>

            <?php Pjax::end(); ?>
        </div>

    </div>
</div>
