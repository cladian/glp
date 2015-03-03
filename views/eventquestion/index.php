<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\EventquestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Preguntas por Evento';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventquestion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Pregunta por Evento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'status',
//            'created_at',
//            'updated_at',
            'eventtype_id',
            // 'question_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
