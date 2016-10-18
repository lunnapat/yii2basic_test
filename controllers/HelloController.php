<?php
namespace app\controllers;

class HelloController extends \yii\web\Controller{
    
    public function actionFirst(){
        echo 'Hello Controller action first';
        $title = 'Hello Controller';
        return $this->render('first',['title'=>$title]);
    }
}

