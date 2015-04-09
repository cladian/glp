<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\TabularForm;
use kartik\builder\Form;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model app\models\Eventanswer */
$this->title = 'Actualizar Respuesta por Evento: ' ;
//$this->params['breadcrumbs'][] = ['label' => 'Respuestas por Evento', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Actualziación';
?>
<?php $form = ActiveForm::begin();?>
    <div class="breadcrumb">
        <?= Html::a(\Yii::$app->params['btnCancel'], [ '/inscription/viewown', 'id'=>$id], ['class' => 'btn btn-danger']) ?>
        <?=Html::submitButton(\Yii::$app->params['btnGuardarCerrar'], ['class' => 'btn btn-success']);?>
        <!-- AYUDA-->
        <?php
        Modal::begin([
            'header' => '<h4>Inscripción</h4>',
            'toggleButton' => ['label' => \Yii::$app->params['btnHelp'], 'class' => 'btn btn-default pull-right'],
        ]);

        echo $this->render('/help/inscription-index');
        Modal::end();
        ?>
    </div>

<div class="panel panel-green">
  <div class="panel-heading">Preguntas Generales</div>
  <div class="panel-body">
    <?=TabularForm::widget([
    'dataProvider' => $dataProvider,
    'form' => $form,
    'attributes' => $model->getGrid(),
/*    'attributeDefaults' => [
        [
            'type' => Form::INPUT_RAW,
            'value'=>function ($model, $key, $index, $widget) {return $model->eventquestion->text; }
        ],
    ],*/
    'actionColumn'=>false,
    'serialColumn'=>false,
    'checkboxColumn'=>false,
]);
// Add other fields if needed or render your submit button
?>

  </div>
</div>

<?php ActiveForm::end(); ?>