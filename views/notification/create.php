<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Notification */

$this->title = 'Crear Notificación';
$this->params['breadcrumbs'][] = ['label' => 'Notificaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notification-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
