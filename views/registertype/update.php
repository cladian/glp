<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Registertype */

$this->title = 'Actualización tipo de Registro: ' . ' ' . $model->name;

?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

