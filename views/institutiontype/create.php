<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Institutiontype */

$this->title = 'Crear Tipo de Institución';
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Institución', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutiontype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
