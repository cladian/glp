<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PhforumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foro';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phforum-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Foro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
