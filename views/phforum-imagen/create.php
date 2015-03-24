<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PhforumImagen */

$this->title = 'Create Phforum Imagen';

?>
<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/phforum-imagen/index'], ['class' => 'btn btn-default'])?>
</div>
<div class="panel panel-green">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
