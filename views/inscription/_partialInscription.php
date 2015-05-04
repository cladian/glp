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

</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php if ($modelProfile) { ?>


                <?= Html::img(\Yii::$app->params['webRoot'].'/'.$modelProfile->getImageUrl(), ['class' => 'img-responsive img-thumbnail']); ?>
                <h5><?= Html::img(\Yii::$app->params['webRoot'].'/'.'imgs/flags/24/' . strtolower($modelProfile->country->iso) . '.png'); ?>
                    <?= $modelProfile->name . ' ' . $modelProfile->lastname;; ?></h5>
                <address>

                    <strong>Teléfono: </strong><?= $modelProfile->phone_number; ?> <br>
                    <strong>Correo: </strong><?= $model->user->email; ?> <br>

                </address>
            <?php } else { ?>
                <?= Html::img(\Yii::$app->params['webRoot'].'/'.Yii::$app->params['avatarFolder'] . 'profile.png', ['class' => 'img-responsive img-thumbnail img-block']); ?>
                <address>
                    <strong>Perfil: </strong>Información pendiente
                </address>
            <?php } ?>
        </div>

    </div>
</div>


