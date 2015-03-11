<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitudes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'question:ntext',
            'answer:ntext',
            'status',
//            'created_at',
            // 'updated_at',
            // 'inscription_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<div class="panel-body">
    <p>
        <?= Html::a('Crear Solicitud', ['request/create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
</div>
