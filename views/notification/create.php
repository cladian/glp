<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Notification */

$this->title = 'Crear Notificación';

?>


    <?= $this->render('_form', [
        'model' => $model,
        'id'=>$id

    ]) ?>
