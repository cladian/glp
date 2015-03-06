<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Registertype */

$this->title = 'Crear Tipo de Registro';
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Registro', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registertype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
