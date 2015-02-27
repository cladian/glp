<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'My Yii Application';




?>


<div class="site-index">

    <div class="jumbotron">
        <h1>Bienvenidos</h1>
        <code class="lead"><?= Yii::$app->formatter->asDate(date('Y-m-d'), 'long') ?></code>

        <p class="lead">Al sistema de Registro de Participantes ASOCAM, a tavés de este sistema podrá registrarse y
            acceder a la información, materiales y demás cursos disponibles para los participantes de los eventos regionales</p>


        <p>
            <?= Html::a('Registrarme', ['site/signup/'], ['class' => 'btn btn-lg btn-primary']) ?>
            <?= Html::a('Ingresar', ['site/login/'], ['class' => 'btn btn-lg btn-success']) ?>
        </p>
    </div>

    <div class="body-content">
        <div class="row">
            <?php  // Begin ForEach
                foreach ($modelEvent as $event) {
                   /* $timeDiff = date_diff(date_create($event->begin_at),date_create(date('Y-m-d')));*/

                    //$timeDiff=intval($timeDiff/86400);
                  //  $timeDiff=date('Y-m-d');
                    ?>
                <div class="col-lg-4"><h4><?= $event->name; ?></h4>

                    <p><?= $event->short_description; ?></p>
                   <!-- <p><?php /*echo $timeDiff;*/?></p>-->
                    <address>
                        <strong><?= $event->city . ', ' . $event->country->name; ?></strong><br>
                        <strong>Inicia: </strong><?= Yii::$app->formatter->asDate($event->begin_at, 'long'); ?><br>
                        <strong>Finaliza: </strong><?= Yii::$app->formatter->asDate($event->end_at, 'long'); ?><br>
                        <strong>Inversión: </strong><?= $event->cost; ?> USD
                    </address>
                    <?= Html::a('Más información', ['site/signup/'], ['class' => 'btn  btn-primary']) ?>
                </div>
            <?php }  // End ForEach ?>
        </div>

    </div>


</div>
