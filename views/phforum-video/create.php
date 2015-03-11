<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PhforumVideo */

$this->title = 'Create Phforum Video';
$this->params['breadcrumbs'][] = ['label' => 'Phforum Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phforum-video-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
