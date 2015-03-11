<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Phforum */

$this->title = 'Crear Foro';
$this->params['breadcrumbs'][] = ['label' => 'Phforums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phforum-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
