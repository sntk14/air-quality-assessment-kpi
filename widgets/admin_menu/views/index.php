<?php

use yii\helpers\Url;

?>
<ul class="sidebar-menu">
    <li class="header">Меню</li>
    <!-- Optionally, you can add icons to the links -->

    <?php if (is_array($menu)): ?>
        <?php foreach ($menu as $key => $value): ?>
            <?php if ($value['parent'] and isset($value['chield_elements'])): ?>
                <li class="treeview">
                    <a href="#"><i class="fa fa-files-o"></i> <span><?= $value['name'] ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">                      
                        <?php foreach ($value['chield_elements'] as $k => $v): ?>
                        <li><a href="<?= $v['url'] ?>" data-aliases="<?= implode(';', $v['aliases'] ?? []) ?>"><i class="fa fa-fw fa-gear"></i> <span><?= $v['name'] ?></span></a></li>
                        <?php endforeach; ?>                        
                    </ul>
                </li>
            <?php else: ?>
                <li>
                    <a href="<?= $value['url'] ?>" data-aliases="<?= implode(';', $value['aliases']) ?>"><i class="fa fa-link"></i> <span><?= $value['name'] ?></span></a>
                </li>
            <?php endif; ?>

        <?php endforeach; ?>
    <?php endif; ?>

</ul>

<?php
$Js = "
    
    var currentUrl = '" . Url::current() . "';

    let elem = $('.sidebar-menu [href*=\"'+currentUrl+'\"], .sidebar-menu [data-aliases*=\"'+currentUrl+'\"]').parents('li, .treeview').addClass('active');
    
";

$this->registerJs($Js);

?>