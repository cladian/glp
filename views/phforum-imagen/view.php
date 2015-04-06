<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PhforumImagen */

$this->title = $model->phforum_id;
//$this->params['breadcrumbs'][] = ['label' => 'Phforum Imagens', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regresar">

    <?= Html::a(\Yii::$app->params['btnRegresar'],['/phforum/view','id' => $model->phforum_id], ['class' => 'btn btn-default'])?>

</div>

<div class="panel panel-green">
    <div class="panel-heading">Imagen</div>
    <div class="panel-body">
<div class="phforum-imagen-view">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

<!--    <p>-->
<!--        --><?//= Html::a('Update', ['update', 'phforum_id' => $model->phforum_id, 'imagen_id' => $model->imagen_id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Delete', ['delete', 'phforum_id' => $model->phforum_id, 'imagen_id' => $model->imagen_id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
<!--    </p>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'phforum_id',
            'imagen_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
</div>
</div>


