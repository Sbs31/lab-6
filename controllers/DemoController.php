<?php

namespace app\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\DemoXml;
use Yii;
class DemoController extends \yii\web\Controller
{

    public function actionXml()
    {
        $demo = new DemoXml();
        $demo->generateXml();
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type', 'text/xml');
        return $this->renderPartial('xml');
    }

}
