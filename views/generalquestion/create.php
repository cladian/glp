<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Generalquestion */

$this->title = 'Crear Pregunta General';
$this->params['breadcrumbs'][] = ['label' => 'Preguntas Generales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generalquestion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
