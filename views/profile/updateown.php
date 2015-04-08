<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = 'Actualización de Perfil: ' . ' ' . $model->name;
?>
<div class="regresar">
    <?= Html::a(\Yii::$app->params['btnRegresar'],['/profile/viewown'], ['class' => 'btn btn-default'])?>
</div>
<div class="panel panel-primary">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <div class="profile-update">

    

    <?= $this->render('_formown', [
        'model' => $model,
    ]) ?>

	</div>

  </div>
</div>





