<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Inscription */

$this->title = 'Crear Inscripción';
$this->params['breadcrumbs'][] = ['label' => 'Inscripciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscription-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formown', [
        'model' => $model,
    ]) ?>

</div>
