<?php
/*
 * Visualización a detalle del evento utilizando para mostrar información general del evento
 * Edison Panchi
 */
use yii\helpers\Html;

?>
<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
        Información del evento
    </div>
    <?= Html::img($model->getImageUrl(), ['class' => 'img-responsive figure']); ?>
    <div class="panel-body">

        <h4><?= $model->name; ?></h4>

        <div style="float:right; margin:10px;" class='img-responsive img-thumbnail'>
            <div
                align="center"><?= Html::img('imgs/flags/' . strtolower($model->country->iso) . '.png', ['class' => 'img-responsive']); ?></div>
            <kbd><?= $model->city; ?>, <i><?=$model->country->name; ?></i></kbd>
        </div>
        <p align="justify"><?= $model->short_description; ?></p>

        <hr>
        <address>
            <strong>Inicia: </strong><?= Yii::$app->formatter->asDate($model->begin_at, 'long'); ?><br>
            <strong>Finaliza: </strong><?= Yii::$app->formatter->asDate($model->end_at, 'long'); ?><br>

        </address>
        <h3>PENDIENTE, control de botones por acceso</h3>
        <?= Html::a('Registrarme', ['site/signup/'], ['class' => 'btn btn-success btn-lg btn-block']) ?>
        <?= Html::a('Informa', ['/site/admuser'], ['class' => 'btn btn-default btn-lg btn-block']) ?>
    </div>

</div>