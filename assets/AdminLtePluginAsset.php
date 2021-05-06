<?php
namespace app\assets;

use yii\web\AssetBundle;

class AdminLtePluginAsset extends AssetBundle
{

    public $baseUrl = '@web/adminLTE/dist';
    public $css = [
        'css/AdminLTE.min.css',
        'css/skins/skin-blue.min.css',
        '/css/font-awesome.css',
        '/css/ionicons.css',
        // more plugin CSS here
    ];
    public $js = [
        'js/app.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}
