<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inscription */

$this->title = 'Actualización de  Inscripción: ' . ' ' . $model->id;

?>
<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/inscription/viewown','id' => $model->id], ['class' => 'btn btn-default'])?>
</div>

    <?= $this->render('_formown', [
        'model' => $model,
        'modelLogistic' => $modelLogistic,
    ]) ?>
