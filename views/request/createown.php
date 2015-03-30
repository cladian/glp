<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Request */

$this->title = 'Crear Solicitudes';
?>
<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/inscription/viewown','id' => $id], ['class' => 'btn btn-default'])?>
</div>

<div class="request-create">

    <?= $this->render('_formown', [
        'model' => $model,
    ]) ?>

</div>
