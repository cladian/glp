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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= Editable::widget([
        'model'=>$model,
        'attribute' => 'name',
        'type'=>'primary',
        'size'=>'lg',
       // 'inputType'=>Editable::INPUT_RATING,
        'editableValueOptions'=>['class'=>'text-success h3']
    ]);
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
            'description:ntext',
            'status',
//            'created_at',
//            'updated_at',
        ],
    ]) ?>

</div>
