<?php

namespace app\controllers;

use app\models\Indicator;
use app\models\Laboratory;
use app\models\QualityIndex;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
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
        $laboratories = Laboratory::find()->all();

        return $this->render('index',[
            'laboratories' => $laboratories
        ]);
    }

    public function actionLaboratory($id)
    {
        $chartData = [];
        $labels = [];

        $dataProvider = new ActiveDataProvider([
            'query' => QualityIndex::find()
                ->where(['laboratory_id' => $id])
                ->orderBy('id desc'),
        ]);
        $dataProvider->pagination->pageSize = 50;

        $indicators = QualityIndex::find()
            ->select(['value','date'])
            ->where(['laboratory_id' => $id])
            ->all();

        $chartData = array_values(ArrayHelper::map($indicators, 'value', 'value'));

        $step = (int)floor(count($indicators) / 15);
        for ($i = 0; $i < 15; $i++) {
            $labels[] = date('d-n-Y', $indicators[$i * $step]->date);
        }

        return $this->renderPartial('laboratory', [
            'dataProvider' => $dataProvider,
            'data' => $chartData,
            'labels' => $labels
        ]);
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
