<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PhforumVideo */

$this->title = 'Update Phforum Video: ' . ' ' . $model->phforum_id;
$this->params['breadcrumbs'][] = ['label' => 'Phforum Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->phforum_id, 'url' => ['view', 'phforum_id' => $model->phforum_id, 'video_id' => $model->video_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="phforum-video-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
