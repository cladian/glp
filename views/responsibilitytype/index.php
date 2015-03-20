<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResponsibilitytypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipos de Responsabilidad';
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

           // 'id',
            'name',
            'description:ntext',
            'status',
            /*'created_at',
            'updated_at',*/

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
  </div>
</div>

<p>
        <?= Html::a(\Yii::$app->params['btnCrearResponsabilidad'], ['create'], ['class' => 'btn btn-success']) ?>
    </p>
