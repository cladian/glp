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
                foreach ($modelEvent as $event) {?>

                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <?= Html::img('imgs/event/0.jpg',['class'=>'img-responsive']);?>
                                <div class="caption">
                                    <h3><?= $event->name; ?></h3>
                                    <p><?= $event->short_description; ?></p>
                                    <address>
                                        <strong><?= $event->city . ', ' . $event->country->name; ?></strong><br>
                                        <strong>Inicia: </strong><?= Yii::$app->formatter->asDate($event->begin_at, 'long'); ?><br>
                                        <strong>Finaliza: </strong><?= Yii::$app->formatter->asDate($event->end_at, 'long'); ?><br>
                                        <strong>Inversión: </strong><?= $event->cost; ?> USD
                                    </address>
                                    <p>
                                        <?= Html::a('Más información', ['site/event/','id'=>$event->id], ['class' => 'btn  btn-primary']) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
            <?php }  // End ForEach ?>
        </div>

    </div>


</div>
<?= \Yii::$app->params['adminEmail'];?>
