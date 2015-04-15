<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Imagen */

$this->title = 'Crear Imagen';
/*$this->params['breadcrumbs'][] = ['label' => 'Imagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>


    <?= $this->render('/imagen/_formtopic', [
        'model' => $model,
    'id'=>$id,
    ]) ?>

