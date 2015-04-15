<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Document */

//$this->title = 'Crear Documento';
$this->title='Nuevo documento';
?>


    <?= $this->render('/document/_form', [
        'model' => $model,

    ]) ?>

