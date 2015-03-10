<?php
if (YII_ENV_DEV){
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=asocam_glp',
        'username' => 'cladian',
        'password' => 'cladian',
        'charset' => 'utf8',
    ];
}else{
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=cladiann_glp',
        'username' => 'cladiann_glpuser',
        'password' => 'D3s4rr0ll0',
        'charset' => 'utf8',
    ];
}


