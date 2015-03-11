<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PhforumDocument */

$this->title = 'Update Phforum Document: ' . ' ' . $model->phforum_id;
$this->params['breadcrumbs'][] = ['label' => 'Phforum Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->phforum_id, 'url' => ['view', 'phforum_id' => $model->phforum_id, 'document_id' => $model->document_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="phforum-document-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
