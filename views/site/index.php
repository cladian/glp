<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'My Yii Application';

?>
<!-- SlideShow -->
<<<<<<< HEAD


<!-- copia -->
<!-- Landing Page Hero (with full-width background) -->
<section class="slide">
        <center class="caja-slide">
        <div class="hidden-xs hidden-lg hidden-md col-xs-7 col-sm-7 col-md-7 col-lg-7">
            
                <h1 class="tituto-slide">Bienvenidos</h1>
                <p class="texto-slide">Al sistema de Registro de Participantes ASOCAM, a tavés de este sistema podrá registrarse y
                acceder a la información, materiales y demás cursos disponibles para los participantes de los eventos
                regionales</p>
            
        </div>
        </center>
<!-- ingreso -->

        <!-- Sign up Form -->
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
          <br>
          <div class="caja">
            <div class="panel-heading"><h2 class="titulo-registro">Empieza ya (¡es gratis!)</h2></div>
            <div class="panel-body">

<!-- form -->
            <form name="signupForm" method="post" action="/signup?nomo=1" class="responsive-form marketing-form l-block-2 js-validate-signup">
                <!-- Hidden input fields... signup_page value is page specific -->
                <input type="hidden" name="signup_page" value="es_registration-online">
                <input type="hidden" name="submitted" value="1">
                <input type="hidden" name="forward" value="/create">
                <!-- END: Hidden input fields... signup_page value is page specific -->
                
                <div class="responsive-form__input--icon responsive-form__input--icon--bg">
                    <input class="glyphicon glyphicon-align-left" type="email" name="email" placeholder="Correo" />
                </div>
                <br>
                <div class="responsive-form__input--icon responsive-form__input--icon--bg l-block-2">
                    <input type="password" name="passwd1" placeholder="Contraseña" />
                </div>
                <br>
                <input type="submit" class="btn btn-success btn-lg btn-block" value="¡Empieza!">
            </form>
<!-- end form -->
            <div>
                <p style="text-align:center; padding-top: 20px;" class="texto-info">Al hacer clic en "¡Empieza!", confirmo que acepto los términos de servicio, la política de privacidad, y la política de cookies de ASOCAM, así como recibir comunicaciones de marketing de ASOCAM.</p>
                <p class="aviso">¿Ya eres miembro? <a href="/login" class="marketing-text--white">Inicia sesión</a></p>
            </div>
            </div>
          </div>
        </div>
        <!-- END: Sign up Form -->
<!-- end ingreso -->

        <!-- Hero Headline and subline (Hidden on small and medium screens) -->
        <div style="text-align:justify; padding-top: 60px;" class="hidden-xs hidden-sm col-xs-12 col-sm-12 col-md-7 col-lg-7">
            <div class="caja-slide">
                <h1 class="tituto-slide">Bienvenidos</h1>
                <p class="texto-slide">Al sistema de Registro de Participantes ASOCAM, a tavés de este sistema podrá registrarse y
                acceder a la información, materiales y demás cursos disponibles para los participantes de los eventos
                regionales</p>
            </div>
        </div>
        <!-- END: Hero Headline and subline -->
=======
<div id="carousel-example-generic" class="hidden-xs hidden-sm carousel slide" data-ride="carousel">
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
<br>
<!-- END SlideShow -->

<!-- Ingreso y Registro -->
<div class=" hidden-lg hidden-md site-index">

    <div class="jumbotron">
        <h1>Bienvenidos</h1>
        <code class="lead"><?= Yii::$app->formatter->asDate(date('Y-m-d'), 'long') ?></code>

        <p class="lead">Al sistema de Registro de Participantes ASOCAM, a tavés de este sistema podrá registrarse y
            acceder a la información, materiales y demás cursos disponibles para los participantes de los eventos
            regionales</p>
>>>>>>> FETCH_HEAD

</section>
<!-- END: Landing Page Hero (with full-width background) -->

<<<<<<< HEAD

<!-- end copia -->
<!-- relleno -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">         
    <h1 class="tituto-relleno">Te proporcionamos todas las novedades que necesitas para sobre nuestros eventos.</h1>
    <p class="texto-relleno">ASOCAM te permite planificar cualquier evento, hacerle un seguimiento y promocionarlo.</p>
</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">         
    <center><span style="color:#999; font-size: 70px;" class="glyphicon glyphicon-time" aria-hidden="true"></span></center>
    <h3 class="texto-cursos">Publica un evento en solo unos minutos</h3>
    <p class="texto-rell">¡Es muy fácil organizar festivales, espectáculos, recogidas de fondos, conferencias, fiestas, talleres y eventos de todo tipo!</p>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">         
    <center><span style="color:#999; font-size: 70px;" class="glyphicon glyphicon-cog" aria-hidden="true"></span></center>
    <h3 class="texto-cursos">Publica un evento en solo unos minutos</h3>
    <p class="texto-rell">¡Es muy fácil organizar festivales, espectáculos, recogidas de fondos, conferencias, fiestas, talleres y eventos de todo tipo!</p>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">         
    <center><span style="color:#999; font-size: 70px;" class="glyphicon glyphicon-credit-card" aria-hidden="true"></span></center>
    <h3 class="texto-cursos">Publica un evento en solo unos minutos</h3>
    <p class="texto-rell">¡Es muy fácil organizar festivales, espectáculos, recogidas de fondos, conferencias, fiestas, talleres y eventos de todo tipo!</p>
</div>
<!-- end relleno -->

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
</div>

                <?php  // Begin foreach
                foreach ($modelEvent as $event) {
                    ?>

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <?= Html::img($event->getImageUrl(), ['class' => 'img-responsive figure']); ?>
                            <div class="caption">
                                <center><h3><?= $event->name; ?></h3></center>

                                <!-- <p><?= $event->short_description; ?></p> -->
                               
                                <p>
                                    <?= Html::a('Más información', ['site/event/', 'id' => $event->id], ['class' => 'btn btn-primary btn-block']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php }  // End ForEach ?>
=======
        <p>
            <?= Html::a('Registrarme', ['site/signup/'], ['class' => 'btn btn-lg btn-primary']) ?>
            <?= Html::a('Ingresar', ['site/login/'], ['class' => 'btn btn-lg btn-success']) ?>
        </p>
    </div>




</div>
<!-- END Ingreso y Registro -->
<center class="hidden-xs hidden-sm ">
    <?= Html::a('Registrarme', ['site/signup/'], ['class' => 'btn btn-lg btn-primary']) ?>
    <?= Html::a('Ingresar', ['site/login/'], ['class' => 'btn btn-lg btn-success']) ?>
</center>
<br class="hidden-xs hidden-sm ">
<!-- Eventos -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">Eventos próximos a realizarse</div>
        <div class="panel-body">
            <?php  // Begin ForEach
            foreach ($modelEvent as $event) {
                ?>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <?= Html::img($event->getImageUrl(), ['class' => 'img-responsive figure']); ?>
                        <div class="caption">
                            <h3><?= $event->name; ?></h3>

                            <!-- <p><?= $event->short_description; ?></p> -->
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
>>>>>>> FETCH_HEAD


