<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Reply */

$this->title = 'Crear Respuesta';
//$this->params['breadcrumbs'][] = ['label' => 'Respuestas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reply-create">



    <?= $this->render('_form', [
        'model' => $model,
        'modelReply' => $modelReply,
    ]) ?>

</div>


