<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Eventtype */

$this->title = $model->name;
?>
<div class="breadcrumb">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/eventtype/index'], ['class' => 'btn btn-default'])?>

<?= Html::a(\Yii::$app->params['btnActualizar'], ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
</div>
<div class="eventtype-view">

    <div class="panel panel-green">
        <div class="panel-heading"><?= Html::encode($this->title) ?></div>
        <div class="panel-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
            'description:ntext',
            [
                'label' => 'Estado',
                'value'=>$model->getStatus ($model->status),

            ], //            'created_at',
//            'updated_at',
        ],
    ]) ?>

</div>
</div>
</div>
