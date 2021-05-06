<?php
   
    namespace app\modules\admin\controllers;

    use app\controllers\CController as MainC;
    use yii\filters\AccessControl;
    use yii\helpers\Url;

    class CController extends MainC
    {

        public function behaviors()
        {

            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
//                            'roles' => ['admin'],
                        ],
                    ],
                    'denyCallback' => function($rule, $action) {
                        return $this->redirect(Url::toRoute(["/site/logout"]));
                    },
                ]
            ];
        }

        public function init()
        {
            return parent::init();
        }

    }
    