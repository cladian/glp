<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Generalquestion */

$this->title = 'Actualizar Pregunta General: ' . ' ' . $model->id;

?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

