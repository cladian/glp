<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Generalquestion */

$this->title = 'Crear Pregunta General';

?>
<!--<div class="regresar">
<?/*= Html::a(\Yii::$app->params['btnRegresar'],['/generalquestion','Preguntas Generales' => $model->id], ['class' => 'btn btn-default'])*/?>
</div>-->



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

