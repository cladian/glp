<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = 'Actualización de Evento: ' . ' ' . $model->name;

?>
<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/event/view','id' => $model->id], ['class' => 'btn btn-default'])?>
</div>
<div class="panel panel-primary">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


</div>
</div>