<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use kartik\editable\Editable;


/* @var $this yii\web\View */
/* @var $model app\models\Institutiontype */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Institución', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutiontype-view">

    <h1>Actualización de Tipo de Institución</h1>

    <p>
         

        <?= Html::a(\Yii::$app->params['btnActualizar'], ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(\Yii::$app->params['btnEliminar'], ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>




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
