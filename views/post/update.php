<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = 'Actualización de Aporte';

?>
<div class="post-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
