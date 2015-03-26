<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\Phforum */

$this->title = $model->name;

?>

<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/phforum','Phforums' => $model->id], ['class' => 'btn btn-default'])?>
</div>


<div class="panel panel-green">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
            'begin_at',
            'end_at',
            'meeting_at',
            'memory_at',
            'content:ntext',
            'topic_number',
//            'event_id',
            [                    // the owner name of the model
                'label' => 'Evento',
                'value' => $model->event->name,
            ],
            'status',
            'created_at',
            'updated_at',
            'is_private',
        ],
    ]) ?>
  </div>
</div>
<div class="phforum-view">


    <p>
        <?= Html::a(\Yii::$app->params['btnActualizar'], ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a(\Yii::$app->params['btnEliminar'], ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?/*= Html::a(\Yii::$app->params['btnTema'], ['topic/create', 'id' => $model->id ], ['class' => 'btn btn-primary']) */?><!--
        <?/*= Html::a(\Yii::$app->params['btnSubirD'], ['phforum/createdoc', 'id' => $model->id ], ['class' => 'btn btn-primary']) */?>
        <?/*= Html::a(\Yii::$app->params['btnSubirV'], ['phforum/createvideo', 'id' => $model->id ], ['class' => 'btn btn-primary']) */?>
        --><?/*= Html::a(\Yii::$app->params['btnSubirI'], ['phforum/createimg', 'id' => $model->id ], ['class' => 'btn btn-primary']) */?>
    </p>

    

</div>

<!--INICIOVista Temas-->

<div class="panel panel-green">
    <div class="panel-heading"><?= Html::encode($this->title) ?></div>
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProviderTopic,
            'filterModel' => $searchTopic,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//            'id',
                'content:ntext',
                'status',
                'created_at',
                'updated_at',
                // 'user_id',
                // 'phforum_id',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>


    <p>

        <?= Html::a(\Yii::$app->params['btnTema'], ['topic/create', 'id' => $model->id ], ['class' => 'btn btn-primary']) ?>

<!--FIN Vista Temas-->

<!--INICIOVista Documentos-->

    <<div class="panel panel-green">
    <div class="panel-heading"><?= Html::encode($this->title) ?></div>
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProviderPDocument,
            'filterModel' => $searchPDocument,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'phforum_id',
                'document_id',
                'created_at',
                'updated_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>
</div>


        <p>

            <?= Html::a(\Yii::$app->params['btnSubirD'], ['phforum/createdoc', 'id' => $model->id ], ['class' => 'btn btn-primary']) ?>

<!--FIN Vista Documentos-->

<!--INICIOVista Videos-->

<div class="panel panel-green">
    <div class="panel-heading"><?= Html::encode($this->title) ?></div>
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProviderPVideo,
            'filterModel' => $searchPVideo,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'phforum_id',
                'video_id',
                'created_at',
                'updated_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>


            <p>

                <?= Html::a(\Yii::$app->params['btnSubirV'], ['phforum/createvideo', 'id' => $model->id ], ['class' => 'btn btn-primary']) ?>


<!--FIN Vista Videos-->

<!--INICIOVista Imagenes-->

<div class="panel panel-green">
    <div class="panel-heading"><?= Html::encode($this->title) ?></div>
    <div class="panel-body">

        <?= GridView::widget([
            'dataProvider' => $dataProviderPImagen,
            'filterModel' => $searchPImagen,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'phforum_id',
                'imagen_id',
                'created_at',
                'updated_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>


                <p>


                    <?= Html::a(\Yii::$app->params['btnSubirI'], ['phforum/createimg', 'id' => $model->id ], ['class' => 'btn btn-primary']) ?>
<!--FIN Vista Imagenes-->
