<?php

use app\assets\AdminLtePluginAsset;
use app\widgets\admin_menu\AdminMenu;
use yii\helpers\Html;
use yii\helpers\Url;

AdminLtePluginAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>


<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="<?= Url::toRoute(['/admin/']) ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>KPI</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>KPI</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <?= AdminMenu::widget([
                'user_id' => Yii::$app->user->id,
                'menu' => [
                    [
                        'name' => 'Головна', // string название
                        'url' => Url::toRoute(['/admin/main']), // string ссылка
                        'aliases' => [
                            Url::toRoute(['/admin/main/index']),
                            Url::toRoute(['/admin/main'])
                        ], // string, array алиасы, для подсветки текущего роута
                        'icon' => 'fa fa-link', //иконка элемента
                        'parent' => true, //если есть дочерние элементы
                    ],
                    [
                        'name' => 'Контрольні пункти', // string название
                        'url' => Url::toRoute(['/admin/laboratory/index']), // string ссылка
                        'aliases' => [
                            Url::toRoute(['/admin/laboratory/index']),
                            Url::toRoute(['/admin/laboratory/index'])
                        ], // string, array алиасы, для подсветки текущего роута
                        'icon' => 'fa fa-link', //иконка элемента
                        'parent' => true, //если есть дочерние элементы
                    ],
                    [
                        'name' => 'Типи показників', // string название
                        'url' => Url::toRoute(['/admin/indicator-type/index']), // string ссылка
                        'aliases' => [
                            Url::toRoute(['/admin/indicator-type/index']),
                            Url::toRoute(['/admin/indicator-type/index'])
                        ], // string, array алиасы, для подсветки текущего роута
                        'icon' => 'fa fa-link', //иконка элемента
                        'parent' => true, //если есть дочерние элементы
                    ],
                    [
                        'name' => 'Коефіцієнти', // string название
                        'url' => Url::toRoute(['/admin/coefficient/index']), // string ссылка
                        'aliases' => [
                            Url::toRoute(['/admin/coefficient/index']),
                            Url::toRoute(['/admin/coefficient/index'])
                        ], // string, array алиасы, для подсветки текущего роута
                        'icon' => 'fa fa-link', //иконка элемента
                        'parent' => true, //если есть дочерние элементы
                    ],
                    [
                        'name' => 'Показники', // string название
                        'url' => Url::toRoute(['/admin/indicator/index']), // string ссылка
                        'aliases' => [
                            Url::toRoute(['/admin/indicator/index']),
                            Url::toRoute(['/admin/indicator/index'])
                        ], // string, array алиасы, для подсветки текущего роута
                        'icon' => 'fa fa-link', //иконка элемента
                        'parent' => true, //если есть дочерние элементы
                    ],
                    [
                        'name' => 'Оцінка якості повітря', // string название
                        'url' => Url::toRoute(['/admin/quality-index/index']), // string ссылка
                        'aliases' => [
                            Url::toRoute(['/admin/quality-index/index']),
                            Url::toRoute(['/admin/quality-index/index'])
                        ], // string, array алиасы, для подсветки текущего роута
                        'icon' => 'fa fa-link', //иконка элемента
                        'parent' => true, //если есть дочерние элементы
                    ],

                ]
            ]);
            ?>
            <a href="<?= Url::toRoute(['/site/logout']) ?>" class="btn btn info">Вийти</a>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Your Page Content Here -->
            <?= $content ?>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="pull-right-container">
                                            <span class="label label-danger pull-right">70%</span>
                                        </span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
