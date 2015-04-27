<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = $model->name;
?>
<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/site/index'], ['class' => 'btn btn-default'])?>
</div>
<div class="country-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       <?= Html::a(\Yii::$app->params['btnActualizar'], ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        
    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
            'color',
            'is_event_city',
            'iso',
            'phonecode',
//            'status',

            [
                'label' => 'Estado',
                'value'=>$model->getStatus ($model->status),

            ],//            'created_at',
//            'updated_at',
        ],
    ]) ?>

</div>
