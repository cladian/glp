<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PhforumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foro';
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
</div>


<div class="phforum-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
        <?= Html::a(\Yii::$app->params['btnForo'], ['create'], ['class' => 'btn btn-success']) ?>
   

    

</div>
