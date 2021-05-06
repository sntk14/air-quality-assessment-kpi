<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\widgets\ActiveForm;

class SiteController extends CController
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionLogin()
    {
        $this->layout = false;
        $login_model = new LoginForm();

        $login_model->load(Yii::$app->request->post());
        if (Yii::$app->request->isPost) {

            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($login_model);
            }

            if ($login_model->validate()) {
                Yii::$app->user->login($login_model->getUser(), 3600 * 24 * 7);
                return $this->redirect($this->profileUrl());
            }
        }

        return $this->render('login', [
            'modelLogin' => $login_model
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
