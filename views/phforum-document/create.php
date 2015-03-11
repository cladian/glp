<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PhforumDocument */

$this->title = 'Create Phforum Document';
$this->params['breadcrumbs'][] = ['label' => 'Phforum Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phforum-document-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
