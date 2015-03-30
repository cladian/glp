<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TopicImagen */

$this->title = 'Create Topic Imagen';
$this->params['breadcrumbs'][] = ['label' => 'Topic Imagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topic-imagen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
