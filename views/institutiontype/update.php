<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Institutiontype */

$this->title = ' Actualización de: ' . ' ' . $model->name;

?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
