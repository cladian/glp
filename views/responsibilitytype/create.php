<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Responsibilitytype */

$this->title = 'Crear Tipo de Responsabilidad';
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Responsabilidad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="responsibilitytype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
