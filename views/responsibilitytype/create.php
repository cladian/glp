<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;



/* @var $this yii\web\View */
/* @var $model app\models\Responsibilitytype */

$this->title = 'Crear Tipo de Responsabilidad';

?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
