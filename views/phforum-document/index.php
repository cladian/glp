<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PhforumDocumentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Phforum Documents';
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
            'document_id',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

  </div>
</div>

        <?= Html::a('Create Phforum Document', ['create'], ['class' => 'btn btn-success']) ?>
