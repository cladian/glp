<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Eventquestion */

$this->title = 'Crear Pregunta de Evento';
?>
<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/event/view','id' => $id], ['class' => 'btn btn-default'])?>
</div>
<div class="panel panel-green">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

  </div>
</div>