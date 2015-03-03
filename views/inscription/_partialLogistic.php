<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Logistic */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'logística', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logistic-view">

    <h2>Registro de Logistica </h2>

    <p>
        <?= Html::a('Actualizar', ['logistic/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?/*= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'inscription_id',
            'leavingonorigincity',
            'leavingonairline',
            'leavingonflightnumber',
            'leavingondate',
            'leavingonhour',
            'returningonairline',
            'returningonflightnumber',
            'returningondate',
            'returningonhour',
            'residence',
            'residenceobs:ntext',
            'accommodationdatein',
            'accommodationdateout',
            'status',
//            'created_at',
//            'updated_at',
        ],
    ]) ?>

</div>
