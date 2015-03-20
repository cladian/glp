<?php

use yii\helpers\Html;
//use yii\grid\GridView;


use kartik\grid\GridView;
use kartik\editable\Editable;


/* @var $this yii\web\View */
/* @var $searchModel app\controllers\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paises';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-green">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'color',
            'iso',
           // 'phonecode',
            'is_event_city',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>
<?php
$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],

    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute'=>'name',
/*        'readonly'=>function($model, $key, $index, $widget) {
            return (!$model->status); // do not allow editing of inactive records
        },*/
        'editableOptions' => [
            'header' => 'Buy Amount',
            'inputType' => \kartik\editable\Editable::INPUT_SPIN,
           'options' => [
                'pluginOptions' => ['min'=>0, 'max'=>5000]
            ]
        ],
        'hAlign'=>'right',
        'vAlign'=>'middle',
        'width'=>'100px',
        //'format'=>['decimal', 2],
        'pageSummary' => true
    ],
];
echo \kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns
]);

?>

  </div>
</div>
    <p>
        <?= Html::a(\Yii::$app->params['btnNuevo'], ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    