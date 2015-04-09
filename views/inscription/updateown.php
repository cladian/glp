<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inscription */

$this->title = 'Actualización de  Inscripción: ' . ' ' . $model->id;

?>
    <?= $this->render('_formown', [
        'model' => $model,
        'modelLogistic' => $modelLogistic,
    ]) ?>
