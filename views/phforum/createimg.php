<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Imagen */


?>
<div class="imagen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('/imagen/_form', [
        'model' => $model,
        'id'=> $id,
    ]) ?>

</div>
