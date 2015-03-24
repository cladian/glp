<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PhforumVideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Phforum Videos';

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

            'phforum_id',
            'video_id',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  </div>
</div>

        <?= Html::a('Create Phforum Video', ['create'], ['class' => 'btn btn-success']) ?>
