<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Eventtype */

$this->title = 'Create Eventtype';
$this->params['breadcrumbs'][] = ['label' => 'Eventtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventtype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
