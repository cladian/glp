<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResponsibilitytypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipos de Responsabilidad';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="responsibilitytype-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Tipo de Responsabilidad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            'description:ntext',
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
            /*'created_at',
            'updated_at',*/

//            ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['responsibilitytype/view', 'id' => $key]);
                        },
                    'update' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['responsibilitytype/update', 'id' => $key]);
                        },

                ]
            ],
        ],
    ]); ?>

</div>