<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TopicVideo */

$this->title = 'Create Topic Video';
$this->params['breadcrumbs'][] = ['label' => 'Topic Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topic-video-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
