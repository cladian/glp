<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TopicDocument */

$this->title = 'Update Topic Document: ' . ' ' . $model->topic_id;
$this->params['breadcrumbs'][] = ['label' => 'Topic Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->topic_id, 'url' => ['view', 'topic_id' => $model->topic_id, 'document_id' => $model->document_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="topic-document-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
