<?php

use yii\helpers\Html;

?>
<?= Html::a('<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Visualizar Inscripción', ['inscription/viewown', 'id' => $modelLogistic->inscription_id], ['class' => 'btn btn-primary']) ?>
<hr>
<?= $this->render('_partialLogistic', ['model' => $modelLogistic]) ?>

<div class="col-sm-6 col-xs-12 col-lg-6">
    <div class="panel-heading "><h5>Preguntas por evento</h5></div>
    <div class="progress">

        <div class="progress-bar progress-bar-info" role="progressbar"
             aria-valuenow="<?= $model->complete_eventquiz; ?>" aria-valuemin="0"
             aria-valuemax="100"
             style="width: <?= $model->complete_eventquiz; ?>%;">
            <?= $model->complete_eventquiz; ?>%
        </div>
    </div>
</div>
<div class="col-sm-6 col-xs-12 col-lg-6">
    <div class="panel-heading"><h5>Preguntas generales</h5></div>
    <div class="progress">

        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $model->complete_quiz; ?>"
             aria-valuemin="0"
             aria-valuemax="100"
             style="width: <?= $model->complete_quiz; ?>%;">
            <?= $model->complete_quiz; ?>%
        </div>
    </div>
</div>
