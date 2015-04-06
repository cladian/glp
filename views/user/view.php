<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
?>
<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/user/index'], ['class' => 'btn btn-default'])?>
</div>

<div class="panel panel-primary">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
//            'created_at',
//            'updated_at',
        ],
    ]) ?>

    <p>
        <?= Html::a(\Yii::$app->params['btnActualizar'], ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(\Yii::$app->params['btnEliminar'], ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

  </div>
</div>
