<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Imagen */


?>
<div class="imagen-create">
    

    <?= $this->render('/imagen/_form', [
        'model' => $model,
        'id'=> $id,
    ]) ?>
</div>
