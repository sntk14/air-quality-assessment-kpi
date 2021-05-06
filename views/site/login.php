<?php

    use app\assets\AdminLtePluginAsset;
    use app\assets\AppAsset;
    use yii\bootstrap\ActiveForm;
    use yii\bootstrap\Html;

AdminLtePluginAsset::register($this);
    AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>         
        <title><?= Html::encode($this->title) ?></title>       
        <?php $this->head() ?>

        <?= Html::csrfMetaTags() ?>
    </head>
    <body class="hold-transition login-page">
        <?php $this->beginBody() ?>


        <div class="login-box">
            <div class="login-logo">
                <b>Панель редагування</b>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">

                <?php
                    $form = ActiveForm::begin([
                            'options' => [
                                'data-pjax' => true
                            ],
                            'enableAjaxValidation' => true,
                            'enableClientValidation' => false,
                            'validateOnBlur' => true,
                            'validateOnChange' => true,
                            'validateOnSubmit' => true,
                        ])

                ?>
                
                <div class="form-group has-feedback">                    
                    <?= $form->field($modelLogin, 'login', ['enableLabel' => false])->textInput(['class' => "form-control", 'placeholder' => 'Введите логин']) ?>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">                    
                    <?= $form->field($modelLogin, 'password', ['enableLabel' => false])->passwordInput(['class' => "form-control", 'placeholder' => 'Введите пароль']) ?>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div> 

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">

                            <?= $form->field($modelLogin, 'rememberMe', ['errorOptions' => ['class' => 'notice2',]])->checkbox()->label('Запомнить меня') ?>

                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <!-- /.login-box-body -->
        </div>


        <?php $this->endBody() ?>

    </body>
</html>
<?php $this->endPage() ?>
