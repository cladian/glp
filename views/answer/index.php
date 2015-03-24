<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Respuestas';
?>
<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/site/index'], ['class' => 'btn btn-default'])?>
</div>
<div class="panel panel-green">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'inscription_id',
//            [
//                'attribute' => 'inscription_id',
//                'value' => function ($data) {
//                        return $data->inscription->exposition;
//                    }
//            ],
//            'question_id',
            [
                'attribute' => 'question_id',
                'value' => function ($data) {
                        return $data->question->text;
                    }
            ],
            // [
            //     'attribute' => 'question_id',
            //     'value'=> function ($data){ return $data->question->question->text;}
            // ],
            'reply:ntext',
//            'created_at',
            // 'updated_at',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  </div>
</div>
<div class="answer-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(\Yii::$app->params['btnCrearRespuesta'], ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    

</div>
