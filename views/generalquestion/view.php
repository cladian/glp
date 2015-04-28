<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Generalquestion */

$this->title = $model->id;

?>
<!--<div class="regresar">
<?/*= Html::a(\Yii::$app->params['btnRegresar'],['/site/index'], ['class' => 'btn btn-default'])*/?>
</div>-->
<div class="breadcrumb">
    <?= Html::a(\Yii::$app->params['btnRegresar'], ['/site/index'], ['class' => 'btn btn-default']) ?>
<!--    --><?//= Html::a(\Yii::$app->params['btnPreguntaGeneral'], ['create'], ['class' => 'btn btn-success']) ?>
    <?= Html::a(\Yii::$app->params['btnActualizar'], ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
</div>
<div class="generalquestion-view">



    <p>

<!--        --><?/*= Html::a(\Yii::$app->params['btnEliminar'], ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>

    <div class="panel panel-green">
        <div class="panel-heading">Preguntas Generales</div>
        <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            [
                'label' => 'Estado',
                'value'=>$model->getStatus ($model->status),

            ], //            'created_at',
//            'updated_at',
            'text',

        ],
    ]) ?>


</div>
</div>
</div>
