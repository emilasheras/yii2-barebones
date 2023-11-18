<?php
namespace app\commands;

use yii\console\Controller;
use Yii;

class TestController extends Controller
{
    public function actionHelloWorld()
    {
        echo 'Hello World! (from console)'.PHP_EOL;
    }
    public function actionLogTargetCategory($category = 'console'){
        Yii::info("Testing log category: [$category]", $category);
        Yii::warning("Testing log category: [$category]", $category);
        Yii::error("Testing log category: [$category]", $category);
        Yii::debug("Testing log category: [$category]", $category);
    }
}