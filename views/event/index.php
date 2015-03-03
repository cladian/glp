<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Evento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'short_description:ntext',
            'general_content:ntext',
            'methodology:ntext',
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
            // 'eventtype_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
