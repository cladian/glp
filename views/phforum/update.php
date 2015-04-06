<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Phforum */



?>
<div class="regresar">
    <?= Html::a(\Yii::$app->params['btnRegresar'],['/phforum/view','id' => $model->id], ['class' => 'btn btn-default'])?>
</div>
<div class="phforum-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
