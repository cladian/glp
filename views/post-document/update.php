<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PostDocument */

$this->title = 'Update Post Document: ' . ' ' . $model->post_id;
$this->params['breadcrumbs'][] = ['label' => 'Post Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->post_id, 'url' => ['view', 'post_id' => $model->post_id, 'document_id' => $model->document_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-document-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
