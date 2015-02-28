<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GeneralquestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Preguntas Generales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generalquestion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Pregunta General', ['create'], ['class' => 'btn btn-success']) ?>
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
//            'question_id',
            [
                'attribute' => 'question_id',
                'value'=> function ($data){ return $data->question->text;}
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
