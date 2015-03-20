<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RegistertypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipos de Registro';
$this->params['breadcrumbs'][] = $this->title;
?>
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
            'role',
            'status',
//            'created_at',
            // 'updated_at',
            // 'registertype_id',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['registertype/view', 'id' => $key]);
                        },
                    'update' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['registertype/update', 'id' => $key]);
                        },

                ]
            ],
        ],
    ]); ?>
  </div>
</div>
    <p>
        <?= Html::a(\Yii::$app->params['btnCrearRegistro'], ['create'], ['class' => 'btn btn-success']) ?>
    </p>