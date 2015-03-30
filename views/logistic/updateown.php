<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Logistic */

$this->title = 'Actualizar Logística: ' . ' ' . $model->id;
?>
<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/inscription/viewown','id' => $id], ['class' => 'btn btn-default'])?>
</div>

<div class="panel panel-primary">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">



    <?= $this->render('_formown', [
        'model' => $model,
    ]) ?>


</div>
</div>