<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PhforumVideo */

$this->title = 'Create Phforum Video';
?>
<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/phforum-video/index'], ['class' => 'btn btn-default'])?>
</div>

<div class="panel panel-green">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

  </div>
</div>