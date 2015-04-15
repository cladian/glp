<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Document */

$this->title = 'Crear Documento';
/*$this->params['breadcrumbs'][] = ['label' => 'Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>

    <?= $this->render('/document/_form', [
        'model' => $model,
        'id'=>$id,
    ]) ?>


