<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = 'Actualización de Evento: ' . ' ' . $model->name;
?>

    <?= $this->render('_resources', [
        'model' => $model,
    ]) ?>
