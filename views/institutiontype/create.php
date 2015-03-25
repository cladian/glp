<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Institutiontype */

$this->title = 'Crear Tipo de Institución';
?>
<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/institutiontype/index'], ['class' => 'btn btn-default'])?>
</div>
<div class="panel panel-green">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
  </div>
</div>