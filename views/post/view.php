<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

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
        <?= Html::a('Subir Documento', ['post/createdoc', 'id' => $model->id ], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Subir Video', ['post/createvideo', 'id' => $model->id ], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Subir Imagen', ['post/createimg', 'id' => $model->id ], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'content:ntext',
            'created_at',
            'updated_at',
            [
                'label' => 'Estado',
                'value'=>$model->getStatus ($model->status),

            ],             'topic_id',
            'user_id',
        ],
    ]) ?>

</div>
