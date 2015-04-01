<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Topic */

$this->title = $model->content;
$this->params['breadcrumbs'][] = ['label' => 'Topics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-green">
    <div class="panel-heading">Temas</div>
    <div class="panel-body">


    <div class="tabs-x align-center tabs-above tab-bordered">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#one2" data-toggle="tab">Información del Tema</a></li>
            <li><a href="#two2" data-toggle="tab">Aportes</a></li>
<!--            <li><a href="#three2" data-toggle="tab">Three</a></li>-->
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="one2">
                <div class="topic-view">

<!--                    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
                    <br/>
                    <p>


                    </p>

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
//            'id',
                            //            'phforum_id',
                            [                    // the owner name of the model
                                'label' => 'Foro',
                                'value' => $model->phforum->name,
                            ],
//            'content:ntext',
                            [                    // the owner name of the model
                                'label' => 'Tema de Foro',
                                'value' => $model->content,
                            ],

                            //            'user_id',
                            [                    // the owner name of the model
                                'label' => 'Usuario',
                                'value' => $model->user->username,
                            ],

                            'created_at',
//            'status',
//            'updated_at',

                        ],
                    ]) ?>

                </div>
                <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>

                <?= Html::a('Subir Documento', ['topic/createdoc', 'id' => $model->id ], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Subir Video', ['topic/createvideo', 'id' => $model->id ], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Subir Imagen', ['topic/createimg', 'id' => $model->id ], ['class' => 'btn btn-primary']) ?>
                <!--        --><?//= Html::a('Crear Aporte', ['post/create', 'id' => $model->id ], ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="tab-pane" id="two2">
                <div class="post-index">


                    <p>

                    </p>

                    <?= GridView::widget([
                        'dataProvider' => $dataProviderPost,
                        'filterModel' => $searchPost,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

//            'id',
                            'content:ntext',
//            'created_at',
//            'updated_at',
//                            'status',
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
                            // 'topic_id',
                            // 'user_id',

//                            ['class' => 'yii\grid\ActionColumn'],
                            ['class' => 'yii\grid\ActionColumn',
                                'template' => '{view} {update}',
                                'buttons' => [
                                    'view' => function ($url, $model, $key) {
                                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['post/view', 'id' => $key]);
                                        },
                                    'update' => function ($url, $model, $key) {
                                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['post/update', 'id' => $key]);
                                        },

                                ]
                            ],
                        ],
                    ]); ?>

                </div>
            </div>
<!--            <div class="tab-pane" id="three2">Thirdamuno, ipsum dolor sit amet, consectetur adipiscing elit. Duis-->
<!--                pharetra varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt condimentum vitae.-->
<!--            </div>-->
        </div>
        </div>
        </div>
    </div>

<!---->
<!---->
<!--<div class="post-form">-->
<!---->
<!--    --><?php //$form = ActiveForm::begin(); ?>
<!---->
<!--    --><?//= $form->field($modelPost, 'content')->textarea(['rows' => 6]) ?>
<!---->
<!---->
<!--    <!--    --><?////= $form->field($model, 'status')->textInput() ?>
<!--    --><?//= $form->field($modelPost, 'status')->dropDownList($model->getStatusList()) ?>
<!---->
<!---->
<!---->
<!--    <div class="form-group">-->
<!--        --><?//= Html::submitButton($modelPost->isNewRecord ? 'Crear' : 'Guardar', ['class' => $modelPost->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
<!--    </div>-->
<!---->
<!--    --><?php //ActiveForm::end(); ?>
<!---->
<!--</div>-->
<!---->
<?php
//foreach ($modelPostList as $post)
//{
//    echo $post->content;
//}
//
//?>