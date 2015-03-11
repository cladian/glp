<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostVideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Post Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-video-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Post Video', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'post_id',
            'video_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
