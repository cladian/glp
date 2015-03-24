<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Phforum */

$this->title = $model->name;

?>

<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/phforum','Phforums' => $model->id], ['class' => 'btn btn-default'])?>
</div>


<div class="panel panel-green">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
            'begin_at',
            'end_at',
            'meeting_at',
            'memory_at',
            'content:ntext',
            'topic_number',
//            'event_id',
            [                    // the owner name of the model
                'label' => 'Evento',
                'value' => $model->event->name,
            ],
            'status',
            'created_at',
            'updated_at',
            'is_private',
        ],
    ]) ?>
  </div>
</div>
<div class="phforum-view">


    <p>
        <?= Html::a(\Yii::$app->params['btnActualizar'], ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a(\Yii::$app->params['btnEliminar'], ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(\Yii::$app->params['btnTema'], ['topic/create', 'id' => $model->id ], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(\Yii::$app->params['btnSubirD'], ['phforum/createdoc', 'id' => $model->id ], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(\Yii::$app->params['btnSubirV'], ['phforum/createvideo', 'id' => $model->id ], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(\Yii::$app->params['btnSubirI'], ['phforum/createimg', 'id' => $model->id ], ['class' => 'btn btn-primary']) ?>
    </p>

    

</div>
