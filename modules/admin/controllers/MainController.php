<?php
    namespace app\modules\admin\controllers;

    use Yii;

    class MainController extends CController
    {

        public function actionIndex()
        {
            return $this->render(\Yii::$app->controller->action->id);
        }

    }    