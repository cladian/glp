<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'My Yii Application';

?>
<!-- SlideShow -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <?= Html::img('imgs/slide/1.jpg' , ['class' => 'img-slide ']); ?>
          <div class="carousel-caption">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate nisi blanditiis provident cum esse possimus ut officia dicta molestiae tenetur aspernatur adipisci eius placeat iste deserunt praesentium, similique debitis, error.
          </div>
        </div>
        <div class="item">
          <?= Html::img('imgs/slide/2.jpg' , ['class' => 'img-slide ']); ?>
          <div class="carousel-caption">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate nisi blanditiis provident cum esse possimus ut officia dicta molestiae tenetur aspernatur adipisci eius placeat iste deserunt praesentium, similique debitis, error.
          </div>
        </div>
        <div class="item">
          <?= Html::img('imgs/slide/3.jpg' , ['class' => 'img-slide ']); ?>
          <div class="carousel-caption">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta asperiores sapiente voluptas, ipsa, quaerat omnis dolor dolore cumque non dolorem natus exercitationem expedita accusamus consectetur delectus repellat recusandae repellendus nesciunt.
          </div>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
<!-- END SlideShow -->

<!-- Ingreso y Registro -->
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

       


    </div>
<!-- END Ingreso y Registro -->

<!-- Eventos -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-primary">
      <div class="panel-heading">Panel heading without title</div>
      <div class="panel-body">
        <?php  // Begin ForEach
                foreach ($modelEvent as $event) {
                    ?>

                    <div class="col-sm-6 col-md-6">
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
<!-- END Eventos -->

