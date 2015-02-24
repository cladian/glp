<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Institutiontype */

$this->title = 'Create Institutiontype';
$this->params['breadcrumbs'][] = ['label' => 'Institutiontypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutiontype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
