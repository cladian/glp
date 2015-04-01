<?php
use yii\helpers\Html;

?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <div class="panel panel-default">
        <div class="panel-body">
            <address>
                <!--                <strong>--><? //= $model->leavingonorigincity ?><!--</strong><br>-->
                <strong>¿Exposición en el evento?: </strong><?= ($model->exposition ? ('SI') : ('NO')); ?><br>
                <strong>¿Esta de acuerdo con los términos de servicio de
                    ASOCAM?: </strong><?= ($model->service_terms ? ('SI') : ('NO')); ?>
                <hr>
                <strong>Tipo de registro: </strong><br><?= $model->registertypeType->name ?><br>
                <strong>Tipo de Asignación: </strong><br><?= $model->registertypeAssigment->name ?>
            </address>
        </div>

    </div>
    <div class="panel panel-default">
        <div class="panel-body">
           <!-- <b>Inscripción</b>
            <div class="progress">

                <div class="progress-bar" role="progressbar"
                     aria-valuenow="<?/*= $model->complete; */?>"
                     aria-valuemin="0" aria-valuemax="100"
                     style="width: <?/*= $model->complete; */?>%;">
                    <?/*= $model->complete; */?>%
                </div>
            </div>-->
            <b>Información Logística</b>
            <div class="progress">
                <div class="progress-bar progress-bar-info" role="progressbar"
                     aria-valuenow="<?= $model->complete_logistic; ?>"
                     aria-valuemin="0" aria-valuemax="100"
                     style="width: <?= $model->complete_logistic; ?>%;">
                    <?= $model->complete_logistic; ?>%
                </div>
            </div>
            <b>Preguntas por evento</b>
            <div class="progress">
                <div class="progress-bar progress-bar-warning" role="progressbar"
                     aria-valuenow="<?= $model->complete_eventquiz; ?>"
                     aria-valuemin="0" aria-valuemax="100"
                     style="width: <?= $model->complete_eventquiz; ?>%;">
                    <?= $model->complete_eventquiz; ?>%
                </div>
            </div>
            <b>Preguntas Generales</b>
            <div class="progress">
                <div class="progress-bar progress-bar-warning" role="progressbar"
                     aria-valuenow="<?= $model->complete_quiz; ?>"
                     aria-valuemin="0" aria-valuemax="100"
                     style="width: <?= $model->complete_quiz; ?>%;">
                    <?= $model->complete_quiz; ?>%
                </div>
            </div>


        </div>

    </div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php if ($modelProfile) { ?>


                <?= Html::img($modelProfile->getImageUrl(), ['class' => 'img-responsive img-thumbnail']); ?>
                <h5><?= Html::img('imgs/flags/24/' . strtolower($modelProfile->country->iso) . '.png'); ?>
                    <?= $modelProfile->name . ' ' . $modelProfile->lastname;; ?></h5>
                <address>

                    <strong>Teléfono: </strong><?= $modelProfile->phone_number; ?> <br>
                    <strong>Correo: </strong><?= $model->user->email; ?> <br>

                </address>
            <?php } else { ?>
                <?= Html::img(Yii::$app->params['avatarFolder'] . 'profile.png', ['class' => 'img-responsive img-thumbnail img-block']); ?>
                <address>
                    <strong>Perfil: </strong>Información pendiente
                </address>
            <?php } ?>
        </div>

    </div>
</div>


