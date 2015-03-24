<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\builder\TabularForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResponsibilitytypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipos de Responsabilidad';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    Panel content


<?php
$form = ActiveForm::begin();?>
<div class="form-group">
    <?=Html::submitButton('Almacenar', ['class' => 'btn btn-primary']);?>
    <?= Html::a('Crear Tipo de Responsabilidad', ['create'], ['class' => 'btn btn-success']) ?>
</div>
<?=TabularForm::widget([
    'dataProvider' => $dataProvider,
    'form' => $form,
    'attributes' => $model->getGrid(),
    'actionColumn'=>false,
    'serialColumn'=>false,
    'checkboxColumn'=>false,


]);
// Add other fields if needed or render your submit button
?>


    <?= Html::a(\Yii::$app->params['btnCrearResponsabilidad'], ['create'], ['class' => 'btn btn-success']) ?>
  </div>
</div>

<?php ActiveForm::end(); ?>
