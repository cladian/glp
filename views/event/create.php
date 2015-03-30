<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = 'Crear evento';

?>
<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/event','Eventos' => $model->id], ['class' => 'btn btn-default'])?>
</div>

<div class="panel panel-green">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
     <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
  </div>
</div>