<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Responsibilitytype */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Responsabilidad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="responsibilitytype-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'status',
//            'created_at',
//            'updated_at',
        ],
    ]) ?>

</div>
