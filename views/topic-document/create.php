<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TopicDocument */

$this->title = 'Create Topic Document';
$this->params['breadcrumbs'][] = ['label' => 'Topic Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topic-document-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
