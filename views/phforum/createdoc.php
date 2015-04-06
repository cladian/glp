<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Document */

//$this->title = 'Crear Documento';

?>
<div class="document-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('/document/_form', [
        'model' => $model,

    ]) ?>

</div>
