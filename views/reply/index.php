<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReplySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Respuestas';
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

//            'user_id',
            [                    // the owner name of the model
                'label' => 'Usuario',
                'value' => function ($model){
                      return $model->user->username;
                    }
            ],
            'request_id',
            'text:ntext',
//            'created_at',
//            'updated_at',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  </div>
</div>
<div class="reply-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(\Yii::$app->params['btnCrearRespuesta'], ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    

</div>
