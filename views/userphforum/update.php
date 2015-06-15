<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Userphforum */

$this->title = 'Update Userphforum: ' . ' ' . $model->phforum_id;
$this->params['breadcrumbs'][] = ['label' => 'Userphforums', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->phforum_id, 'url' => ['view', 'phforum_id' => $model->phforum_id, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="userphforum-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
