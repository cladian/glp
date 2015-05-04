<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Registertype */

$this->title = $model->name;
?>
<div class="breadcrumb">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/registertype/index'], ['class' => 'btn btn-default'])?>

<?= Html::a(\Yii::$app->params['btnActualizar'], ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
</div>
<div class="registertype-view">


    <div class="panel panel-green">
        <div class="panel-heading"><?= Html::encode($this->title) ?></div>
        <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
//            'role',
            [
                'label' => 'Estado',
                'value'=>$model->getStatus ($model->status),

            ], //            'created_at',
//            'updated_at',
//            'registertype_id',
            [                    // the owner name of the model
                'label' => 'Tipo de Registro',
                'value' => $model->registertype->name,
            ],
        ],
    ]) ?>

</div>
</div>
</div>
