<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\Phforum */

$this->title = $model->name;

?>

<div class="breadcrumb">
    <?= Html::a(\Yii::$app->params['btnRegresar'], ['/phforum', 'Phforums' => $model->id], ['class' => 'btn btn-default']) ?>
    <?= Html::a(\Yii::$app->params['btnActualizar'], ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    <?= Html::a(\Yii::$app->params['btnTema'], ['topic/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>


    <?= Html::a(\Yii::$app->params['btnSubirD'], ['phforum/createdoc', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>



    <?= Html::a(\Yii::$app->params['btnSubirV'], ['phforum/createvideo', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    <?= Html::a(\Yii::$app->params['btnSubirI'], ['phforum/createimg', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    <!--    --><?/*= Html::a(\Yii::$app->params['btnEliminar'], ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) */
    ?>
</div>
<?php
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
    //echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
    echo '<div class="alert alert-' . $key . '" role="alert">
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  ' . $message . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
             </div>';
}
?>

<div class="tabs-x align-center tabs-above tab-bordered">
<ul class="nav nav-tabs">
    <li class="active"><a href="#one2" data-toggle="tab">Foro</a></li>
    <li><a href="#two2" data-toggle="tab">Temas</a></li>
    <li><a href="#three2" data-toggle="tab">Documentos</a></li>
    <li><a href="#four2" data-toggle="tab">Videos</a></li>
    <li><a href="#five2" data-toggle="tab">Imagenes</a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="one2">
    <br/>

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
                    'content:html',
//                            'topic_number',
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


</div>
<br/>

<div class="tab-pane" id="two2">

    <!--INICIOVista Temas-->

    <div class="panel panel-green">
        <div class="panel-heading">Temas</div>
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProviderTopic,
//                        'filterModel' => $searchTopic,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//            'id',
                    'content:html',
//                'status',
                    [
                        'attribute' => 'status',
                        /* 'value'=> function ($data){ return $data->question->text;}*/
                        'filter' => [1 => 'ACTIVO', 2 => 'INACTIVO', 0 => 'ELIMINADO'],
                        'value' => function ($model) {
                            if ($rel = $model->getStatus($model->status)) {
                                return $rel;
                            }
                        },

                    ],
                    'created_at',
//                'updated_at',
                    // 'user_id',
                    // 'phforum_id',

//                            ['class' => 'yii\grid\ActionColumn'],

                            ['class' => 'yii\grid\ActionColumn',
                                'template' => '{view} ',
                                'buttons' => [
                                    'view' => function ($url, $model, $key) {
                                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['topic/view', 'id' => $key]);
                                        }

                                ]
                            ],
                        ],
                    ]); ?>
                </div>
            </div>


            <p>



    <!--FIN Vista Temas-->

</div>

<div class="tab-pane" id="three2">


    <!--INICIOVista Documentos-->

    <div class="panel panel-green">
        <div class="panel-heading">Documentos</div>
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProviderPDocument,
                'filterModel' => $searchPDocument,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//                'phforum_id',
//                'document_id',
                    [
                        'attribute' => 'document_id',
                        'value' => function ($data) {
                            return $data->document->file;
                        }
                    ],
                    'created_at',
//                'updated_at',

//                            ['class' => 'yii\grid\ActionColumn'],
                    ['class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['phforum-document/view', 'phforum_id' => $model->phforum_id, 'document_id' => $model->document_id]);
                            },
//                                    'update' => function ($url, $model) {
//                                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['phforum-document/update', 'phforum_id' => $model->phforum_id, 'document_id' => $model->document_id]);
//                                        },

                            'delete' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['phforum-document/delete', 'phforum_id' => $model->phforum_id, 'document_id' => $model->document_id]);
                            },

                        ]
                    ],
                ],
            ]); ?>
        </div>

    </div>


    <!--FIN Vista Documentos-->

</div>

<div class="tab-pane" id="four2">

    <!--INICIOVista Videos-->
    <div class="panel panel-green">
        <div class="panel-heading">Videos</div>
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProviderPVideo,
//                        'filterModel' => $searchPVideo,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//                'phforum_id',
//                            'video_id',
                    [
                        'attribute' => 'video_id',
                        'value' => function ($data) {
                            return $data->video->name;
                        }
                    ],
                    'created_at',
//                'updated_at',

//                            ['class' => 'yii\grid\ActionColumn'],
                    ['class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['phforum-video/view', 'phforum_id' => $model->phforum_id, 'video_id' => $model->video_id]);
                            },
//                                    'update' => function ($url, $model) {
//                                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['phforum-document/update', 'phforum_id' => $model->phforum_id, 'document_id' => $model->document_id]);
//                                        },

                            'delete' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['phforum-video/delete', 'phforum_id' => $model->phforum_id, 'video_id' => $model->video_id]);
                            },

                        ]
                    ],
                ],
            ]); ?>
        </div>
    </div>


    <!--FIN Vista Videos-->
</div>

<div class="tab-pane" id="five2">

    <!--INICIOVista Imagenes-->

    <div class="panel panel-green">
        <div class="panel-heading">Imagenes</div>
        <div class="panel-body">

            <?= GridView::widget([
                'dataProvider' => $dataProviderPImagen,
//                        'filterModel' => $searchPImagen,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//                'phforum_id',
//                'imagen_id',
                    [
                        'label' => 'Imagen',
                        'format' => 'raw',

                        'value' => function ($data) {
                            $url = \Yii::$app->params['foroImgs'] . $data->imagen->file;
                            return Html::img($url, ['class' => 'thumbnail', 'style' => 'height:100px;']);
                        }
                    ],
                    'created_at',
//                'updated_at',

//                            ['class' => 'yii\grid\ActionColumn'],

                    ['class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['phforum-imagen/view', 'phforum_id' => $model->phforum_id, 'imagen_id' => $model->imagen_id]);
                            },
//                                    'update' => function ($url, $model) {
//                                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['phforum-document/update', 'phforum_id' => $model->phforum_id, 'document_id' => $model->document_id]);
//                                        },

                            'delete' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['phforum-imagen/delete', 'phforum_id' => $model->phforum_id, 'imagen_id' => $model->imagen_id]);
                            },

                        ]
                    ],

                ],
            ]); ?>
        </div>
    </div>

    <!--FIN Vista Imagenes-->

</div>
</div>
</div>










