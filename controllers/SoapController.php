<?php

namespace app\controllers;

use app\models\Server;
use yii\helpers\VarDumper;
use yii\web\Controller;
use Yii;

class SoapController extends \yii\web\Controller
{
    public function actions()
    {
        return array(
            'quote'=>array(
                'class'=>'Server',
            ),
        );
    }

    public function actionTest()
    {
        $server=new \SoapServer(NULL,[
            'uri' =>  'http://lab6/soap/index',
            'classmap'=>[
                'Test'=>'Server',
            ]
        ]);
        $server->setClass("app\models\Server");
        $server->addFunction(array('getCategories'));
        $server->setClass('app\controllers\SoapController');
        $server->addFunction(SOAP_FUNCTIONS_ALL);
        $server->handle();
        return Server::server();
    }

    public function actionIndex(){

        $server = new \SoapServer(NULL, array('uri' => "http://lab6/soap/index"));
        $server->setObject(new Server());
        ob_start();
        $server->addFunction(array("hello"));
        $server->addFunction(SOAP_FUNCTIONS_ALL);
        return Server::server();
    }

    public function actionClient()
    {
        $client = new \SoapClient(null, array(
            'location' =>
                "http://lab6/soap/index",
            'uri' => "http://lab6/soap/index",
            'trace' => 1));
        $return = $client->__soapCall("Hello",[]);
        var_dump($return);
    }

}
