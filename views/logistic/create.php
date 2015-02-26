<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Logistic */

$this->title = 'Create Logistic';
$this->params['breadcrumbs'][] = ['label' => 'Logistics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logistic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
