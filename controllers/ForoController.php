<?php

namespace app\controllers;

class ForoController extends \yii\web\Controller
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionTopic()
    {
        return $this->render('topic');
    }
    public function actionMultimedia()
    {
        return $this->render('multimedia');
    }
     public function actionMensajes()
    {
        return $this->render('mensajes');
    }

}
