<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Responsibilitytype */

$this->title = 'Create Responsibilitytype';
$this->params['breadcrumbs'][] = ['label' => 'Responsibilitytypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="responsibilitytype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
