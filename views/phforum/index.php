<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PhforumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foro';
?>
<div class="breadcrumb">
    <?= Html::a(\Yii::$app->params['btnRegresar'], ['/site/index'], ['class' => 'btn btn-default']) ?>
    <?= Html::a(\Yii::$app->params['btnForo'], ['create'], ['class' => 'btn btn-success']) ?>
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
            'begin_at',
            'end_at',
            'meeting_at',
            // 'memory_at',
            // 'content:ntext',
            // 'topic_number',
            // 'event_id',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'is_private',

//            ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} ',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['phforum/view', 'id' => $key]);
                        }

                ]
            ],
        ],
    ]); ?>
  </div>

</div>



