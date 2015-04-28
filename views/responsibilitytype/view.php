<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;


/* @var $this yii\web\View */
/* @var $model app\models\Responsibilitytype */

$this->title = $model->name;
?>

<div class="breadcrumb">
    <?= Html::a(\Yii::$app->params['btnRegresar'], ['/responsibilitytype/index'], ['class' => 'btn btn-default']) ?>
    <!--    --><?//= Html::a(\Yii::$app->params['btnPreguntaGeneral'], ['create'], ['class' => 'btn btn-success']) ?>
    <?= Html::a(\Yii::$app->params['btnActualizar'], ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
</div>
<!--<div class="regresar">
<?/*= Html::a(\Yii::$app->params['btnRegresar'],['/site/index'], ['class' => 'btn btn-default'])*/?>
</div>-->

<div class="responsibilitytype-view">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

  <!--  <p>
        <?/*= Html::a(\Yii::$app->params['btnActualizar'], ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) */?>
        
    </p>-->
    <div class="panel panel-green">
        <div class="panel-heading"><?= Html::encode($this->title) ?></div>
        <div class="panel-body">
            <div class="generalquestion-form">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
            'description:ntext',
            [
                'label' => 'Estado',
                'value'=>$model->getStatus ($model->status),

            ], //            'created_at',
//            'updated_at',
        ],
    ]) ?>

</div>
</div>
</div>
</div>

