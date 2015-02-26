<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Logistic */

$this->title = 'Crear logística';
$this->params['breadcrumbs'][] = ['label' => 'logísticas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logistic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
