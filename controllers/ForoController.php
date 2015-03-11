<?php

namespace app\controllers;

class ForoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
