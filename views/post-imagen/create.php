<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PostImagen */

$this->title = 'Create Post Imagen';
$this->params['breadcrumbs'][] = ['label' => 'Post Imagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-imagen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
