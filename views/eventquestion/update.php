<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Eventquestion */

$this->title = 'Update Eventquestion: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Eventquestions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="eventquestion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
