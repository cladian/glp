<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = 'Actualización de Perfil: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Perfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualización';
?>
<div class="profile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formown', [
        'model' => $model,
    ]) ?>

</div>
