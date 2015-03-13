<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Request */

$this->title = 'Crear Solicitudes';
$this->params['breadcrumbs'][] = ['label' => 'Solicitudes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-create">

    <?= $this->render('_formown', [
        'model' => $model,
    ]) ?>

</div>
