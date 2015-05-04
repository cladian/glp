<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Eventtype */

$this->title = 'Actualizar Tipo de Evento: ' . ' ' . $model->name;

?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


