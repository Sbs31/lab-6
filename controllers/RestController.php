<?php


namespace app\controllers;

use app\models\Products;
use yii\rest\ActiveController;

class RestController extends ActiveController
{
    public $modelClass = 'app\models\Products';


    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
            'view' => ['GET', 'HEAD'],
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH'],
            'delete' => ['DELETE'],
        ];
    }
}
