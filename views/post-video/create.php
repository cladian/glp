<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PostVideo */

$this->title = 'Create Post Video';
$this->params['breadcrumbs'][] = ['label' => 'Post Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-video-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
