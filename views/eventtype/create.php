<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Eventtype */

$this->title = 'Crear Tipo de Evento';
?>
<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/eventtype/index'], ['class' => 'btn btn-default'])?>
</div>
<div class="panel panel-green">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
     <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
  </div>
</div>