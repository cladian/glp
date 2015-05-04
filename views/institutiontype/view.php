<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use kartik\editable\Editable;


/* @var $this yii\web\View */
/* @var $model app\models\Institutiontype */

$this->title = $model->name;

?>
<div class="institutiontype-view">



<!--    <p>
         


        <?/*= Html::a(\Yii::$app->params['btnEliminar'], ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>-->


    <div class="breadcrumb">
        <?= Html::a(\Yii::$app->params['btnRegresar'], ['/institutiontype/index'], ['class' => 'btn btn-default']) ?>
        <!--    --><?//= Html::a(\Yii::$app->params['btnPreguntaGeneral'], ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(\Yii::$app->params['btnActualizar'], ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </div>
    <div class="panel panel-green">
        <div class="panel-heading">Tipos de Instituto</div>
        <div class="panel-body">
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
