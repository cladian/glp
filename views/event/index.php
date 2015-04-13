<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use app\models\Eventtype;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Eventos';
?>

<div class="breadcrumb">

    <?= Html::a(\Yii::$app->params['btnRegresar'],['/site/index'], ['class' => 'btn btn-default'])?>
    <?= Html::a(\Yii::$app->params['btnCrearEvento'], ['create'], ['class' => 'btn btn-success']) ?>


    <!-- AYUDA-->
    <?php
    Modal::begin([
        'header' => '<h4>Inscripción</h4>',
        'toggleButton' => ['label' => \Yii::$app->params['btnHelp'], 'class' => 'btn btn-default pull-right'],
    ]);

    echo $this->render('/help/inscription-index');
    Modal::end();
    ?>
</div>

<div class="panel panel-green">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'short_description:ntext',
//            'general_content:ntext',
//            'methodology:ntext',
            // 'addressed_to:ntext',
            // 'included:ntext',
            // 'requirements:ntext',
            // 'file:ntext',
            // 'photo:ntext',
            // 'url:ntext',
            // 'begin_at',
            // 'end_at',
            // 'city',
            // 'cost',
            // 'discount',
            // 'discount_end_at',
            // 'discount_description',
            // 'year',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'country_id',
//            'eventtype_id',
            [
                'attribute' => 'eventtype_id',
//                'filter' => ['eventtype_id=>name'],
                'filter' => ArrayHelper::map(Eventtype::find()->orderBy('name')->asArray()->all(), 'id', 'name'),

                'value' => function ($data) {
                        return $data->eventtype->name;
                    }
            ],

//            ['class' => 'yii\grid\ActionColumn'],
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

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} ',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['event/view', 'id' => $key]);
                        },
                    'update' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['event/update', 'id' => $key]);
                        },

                ]
            ],

        ],
    ]); ?>
  </div>
</div>
<div class="event-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

    </p>

    

</div>
