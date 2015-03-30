<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PostDocument */

$this->title = 'Create Post Document';
$this->params['breadcrumbs'][] = ['label' => 'Post Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-document-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
