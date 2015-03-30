<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;



/* @var $this yii\web\View */
/* @var $model app\models\Responsibilitytype */

$this->title = 'Crear Tipo de Responsabilidad';

?>
<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/responsibilitytype/index'], ['class' => 'btn btn-default'])?>
</div>

<div class="panel panel-green">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
  </div>
</div>
