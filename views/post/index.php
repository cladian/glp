<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aportes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-green">
        <div class="panel-heading"><?= Html::encode($this->title) ?></div>
        <div class="panel-body">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'content:ntext',
//            'created_at',
//            'updated_at',
//            'status',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
    <?= Html::a('Crear Aporte', ['create'], ['class' => 'btn btn-success']) ?>
</div>
</div>
