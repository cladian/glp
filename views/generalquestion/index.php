<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GeneralquestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Generalquestions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generalquestion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Generalquestion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'status',
            'created_at',
            'updated_at',
            'question_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
