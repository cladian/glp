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
            acceder a la información, materiales y demás cursos disponibles para los participantes de los eventos
            regionales</p>


        <p>
            <?= Html::a('Registrarme', ['site/signup/'], ['class' => 'btn btn-lg btn-primary']) ?>
            <?= Html::a('Ingresar', ['site/login/'], ['class' => 'btn btn-lg btn-success']) ?>
        </p>
    </div>

    <div class="body-content">
        <div class="row">

            <?php  // Begin ForEach
            foreach ($modelEvent as $event) {
                ?>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <?= Html::img('imgs/event/0.jpg', ['class' => 'img-responsive']); ?>
                        <div class="caption">
                            <h3><?= $event->name; ?></h3>

                            <p><?= $event->short_description; ?></p>
                            <address>
                                <strong><?= $event->city . ', ' . $event->country->name; ?></strong><br>
                                <strong>Inicia: </strong><?= Yii::$app->formatter->asDate($event->begin_at, 'long'); ?>
                                <br>
                                <strong>Finaliza: </strong><?= Yii::$app->formatter->asDate($event->end_at, 'long'); ?>
                                <br>
                                <strong>Inversión: </strong><?= $event->cost; ?> USD
                            </address>
                            <p>
                                <?= Html::a('Más información', ['site/event/', 'id' => $event->id], ['class' => 'btn  btn-primary']) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php }  // End ForEach ?>
        </div>

    </div>


</div>
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
    <div class="panel panel-default">
        <div class="panel-heading">Panel heading without title</div>
        <div class="panel-body">
            <ul class="bs_timeline">

                <li class="timeline-right">
                    <div class="timeline-panel">
                        <div class="timeline-copy">
                            <h5 class="timeline-title">Responsive Timeline (w/ Bootstrap)</h5>

                            <p style="margin-top: 14px;"><a
                                    href="http://alexwhinfield.co.uk/responsive-css-timeline-twitter-bootstrap/"
                                    title="Grab the source code"><span class="label label-success">Built by Alex Whinfield</span></a>
                            </p>
                        </div>
                    </div>
                    <div class="timeline-badge"><i class="glyphicon glyphicon-envelope"></i></div>
                </li>


                <li class="timeline-right">
                    <div class="timeline-panel">
                        <div class="timeline-copy">
                            <h5 class="timeline-title">Eiusmod Tempor Incididunt</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip.</p>
                        </div>
                    </div>
                    <div class="timeline-badge info"><i class="glyphicon glyphicon-search"></i></div>
                </li>


                <li class="timeline-right">
                    <div class="timeline-panel">
                        <div class="timeline-copy">
                            <h5 class="timeline-title">Eiusmod Tempor Incididunt</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip.</p>
                        </div>
                    </div>
                    <div class="timeline-badge warning"><i class="glyphicon glyphicon-user"></i></div>
                </li>

                <li class="timeline-right">
                    <div class="timeline-panel">
                        <div class="timeline-copy">
                            <h5 class="timeline-title">Eiusmod Tempor Incididunt</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip.</p>
                        </div>
                    </div>
                    <div class="timeline-badge warning"><i class="glyphicon glyphicon-user"></i></div>
                </li>

                <li class="timeline-right">
                    <div class="timeline-panel">
                        <div class="timeline-copy">
                            <h5 class="timeline-title">Eiusmod Tempor Incididunt</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip.</p>
                        </div>
                    </div>
                    <div class="timeline-badge warning"><i class="glyphicon glyphicon-user"></i></div>
                </li>

                <li class="timeline-right">
                    <div class="timeline-panel">
                        <div class="timeline-copy">
                            <h5 class="timeline-title">Eiusmod Tempor Incididunt</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip.</p>
                        </div>
                    </div>
                    <div class="timeline-badge warning"><i class="glyphicon glyphicon-user"></i></div>
                </li>


            </ul>
        </div>
    </div>



    <?= \Yii::$app->params['adminEmail']; ?>
