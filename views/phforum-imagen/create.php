<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PhforumImagen */

$this->title = 'Create Phforum Imagen';
$this->params['breadcrumbs'][] = ['label' => 'Phforum Imagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phforum-imagen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
