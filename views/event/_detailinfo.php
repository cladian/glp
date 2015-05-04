<?php
/*
 * Visualización a detalle del evento utilizando para mostrar información general del evento
 * Edison Panchi
 */
use yii\helpers\Html;

?>

    <div class="panel-heading"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
        Información del evento
    </div>

    <?= Html::img(Yii::$app->urlManager->baseUrl.'/'.$model->getImageUrl(), ['class' => 'img-responsive figure']); ?>
    <div class="panel-body">
        <h4><?= $model->name; ?></h4>


        <div style="float:right; margin:10px;" class='img-responsive img-thumbnail'>
            <div
                align="center"><?= Html::img( Yii::$app->urlManager->baseUrl.'/imgs/flags/' . strtolower($model->country->iso) . '.png', ['class' => 'img-responsive']); ?></div>
            <kbd><?= $model->city; ?>, <i><?= $model->country->name; ?></i></kbd>
        </div>
        <p align="justify"><?= $model->short_description; ?></p>
        <strong>Tipo de evento: </strong><?= $model->eventtype->name ?><br>
        <hr>
        <address>
            <strong>Inicia: </strong><?= Yii::$app->formatter->asDate($model->begin_at, 'long'); ?><br>
            <strong>Finaliza: </strong><?= Yii::$app->formatter->asDate($model->end_at, 'long'); ?>
        </address>
        <?php
        switch ($model->status) {
            case 1:
                echo '<h3><span class="label label-success">'.$model->getStatus($model->status).'</span></h3>';
                break;
            case 2:
                echo '<h3><span class="label label-warning">'.$model->getStatus($model->status).'</span></h3>';
                break;
            case 0:
                echo '<h3><span class="label label-danger">'.$model->getStatus($model->status).'</span></h3>';
                break;
        }
        ?>
    </div>

