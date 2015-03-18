<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'My Yii Application';

?>
<!-- SlideShow -->
    <div id="carousel-example-generic" class="hidden-xs hidden-sm carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active slide">
          <!-- panel -->
         <div class="row">
          <!-- caja -->
          <div class="col-sm-6 col-md-4">
             <div class="panel panel-primary">
              <center class="panel-heading"><h3>Ingresar a su cuenta</h3></center>
              <div class="panel-body">
             
                  
                  <div class="caption">
                    
                    <p>Por favor, rellene los siguientes campos para inscribirse:</p>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                           daniel
                        </div>
                    </div>
                    <br>
                    <p style="font-size:10px;">Para solicitar una cuenta, por favor, póngase en contacto con sus administradores.</p>
                  </div>
                 </div>
            </div>
          </div>
          <!-- caja -->
          <!-- caja -->
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
           
          </div>
          <!-- caja -->
          <div class="col-sm-6 col-md-4">
            <div class="">
              
            </div>
          </div>
          <!-- caja -->
        </div>


          <!-- panel -->
          <div class="carousel-caption">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate nisi blanditiis provident cum esse possimus ut officia dicta molestiae tenetur aspernatur adipisci eius placeat iste deserunt praesentium, similique debitis, error.
          </div>
        </div>
        <div class="item slide">
          
          <div class="carousel-caption">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate nisi blanditiis provident cum esse possimus ut officia dicta molestiae tenetur aspernatur adipisci eius placeat iste deserunt praesentium, similique debitis, error.
          </div>
        </div>
        <div class="item slide">
          
          <div class="carousel-caption">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate nisi blanditiis provident cum esse possimus ut officia dicta molestiae tenetur aspernatur adipisci eius placeat iste deserunt praesentium, similique debitis, error.
          </div>
        </div>
        <div class="item slide">
          
          <div class="carousel-caption">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate nisi blanditiis provident cum esse possimus ut officia dicta molestiae tenetur aspernatur adipisci eius placeat iste deserunt praesentium, similique debitis, error.
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

<!-- END Eventos -->


<title>Registro de eventos en línea - Eventbrite</title>
</head>
<body class="lang-es es-es landing_page js-d-track-event-links" data-automation=''>
    
    


    


    
















    <div id="content" class="clrfix">
        



















    <style>
/** Top hero background **/
.landing-hero {
    background-image: url(//eventbrite-s3.s3.amazonaws.com/marketing/landingpages/sem/SEM_landing_pages_4.jpg);
}

/** Bottom hero background **/
.landing-hero-bottom {
    background-image: url(//eventbrite-s3.s3.amazonaws.com/marketing/landingpages/sem/SEM_landing_pages_4.jpg);
}

.landing_page #content {
    margin-bottom: -30px;
}

</style>

<!-- Landing Page Header with Social Media -->
<header class="landing-header g-grid">
    <div class="g-group">
        <div class="g-cell g-cell-12-12 g-cell-md-4-12 g-cell-lg-2-12 text--centered">
            <a title="Eventbrite" href="//eventbrite.es"><img src="//eventbrite-s3.s3.amazonaws.com/marketing/landingpages/shared/images/eb-logo.png" class="g-img" /></a>
        </div>
        <div class="hide-small g-cell g-cell-12-12 g-cell-md-8-12 g-cell-lg-10-12 l-block-2">
            <div class="landing-social">
                <!-- Facebook LIKE -->
                <div class="social-share-fb">
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&status=0";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-like" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-colorscheme="light" data-font="lucida grande"></div>
                </div>
                <!-- END: Facebook LIKE -->
                <!-- Linkedin Share -->
                <a class="social-share-btn--linkedin social-share-btn" title="Compartir en LinkedIn" target="_blank" href="//www.linkedin.com/shareArticle?mini=true">Compartir en LinkedIn</a>
                <!-- END: Linkedin Share -->
                <!-- Twitter Tweet -->
                <a class="social-share-btn--tweet social-share-btn" title="Compartir en Twitter" target="_blank" href="//twitter.com/share?via=eventbrite&count=none">Compartir en Twitter</a>
                <!-- END: Twitter Tweet -->
            </div>
            <!-- Support text and number -->
            <p class="marketing-text-body--faint hide-medium landing-header-support">¿Quieres hablar con un ser humano? Llama al 0800 0225308.</p>
            <!-- END: Support text and number -->
        </div>
    </div>
</header>
<!-- END:Landing Page Header with Social Media -->

<!-- Landing Page Hero (with full-width background) -->
<section class="landing-hero landing-section--bg landing-section--bg-cover g-group g-group--full-width">
    <div class="g-grid l-block--padded-v-40 l-align-center-md l-align-center-sm">
        <!-- Hero Headline and subline (hidden on large screens) -->
        <div class="g-cell g-cell-12-12 g-cell-md-12-12 g-cell-lg-8-12 hide-large">
            <div class="l-padded-v-bottom-4 l-padded-h-4">
                <h1 class="marketing-text-heading-epic marketing-text--white">Registro de eventos en línea</h1>
                <p class="marketing-text-heading-secondary marketing-text--white hide-small">Crea una página del evento personalizada. Promociona tu evento y haz un seguimiento de la asistencia. Vende entradas y gestiona los registros.</p>
            </div>
        </div>
        <!-- END: Hero Headline and subline -->

        <!-- Sign up Form -->
        <div class="g-cell g-cell-10-12 g-cell-md-7-12 g-cell-lg-4-12 l-block--bg-dark-trans radius l-padded-v-2">
            <h2 class="marketing-text-body-large marketing-text--white text--centered">Empieza ya (¡es gratis!)</h2>
            <form name="signupForm" method="post" action="/signup?nomo=1" class="responsive-form marketing-form l-block-2 js-validate-signup">
                <!-- Hidden input fields... signup_page value is page specific -->
                <input type="hidden" name="signup_page" value="es_registration-online">
                <input type="hidden" name="submitted" value="1">
                <input type="hidden" name="forward" value="/create">
                <!-- END: Hidden input fields... signup_page value is page specific -->
                <div class="responsive-form__input--icon responsive-form__input--icon--bg">
                    <div class="responsive-form__input--icon__container">
                        <i class="ico-mail ico--form-input"></i>
                    </div>
                    <input type="email" name="email" placeholder="Correo" />
                </div>
                <div class="responsive-form__input--icon responsive-form__input--icon--bg l-block-2">
                    <div class="responsive-form__input--icon__container">
                        <i class="ico-lock ico--form-input"></i>
                    </div>
                    <input type="password" name="passwd1" placeholder="Contraseña" />
                </div>
                <input type="submit" class="btn btn--block l-block-2" value="¡Empieza!">
            </form>
            <div class="l-block-2 text--centered">
                <p class="marketing-text-body-xsmall marketing-text-body--faint">Al hacer clic en "¡Empieza!", confirmo que acepto los <a href="/tos/?v=organizers" class="marketing-text--white">términos de servicio</a>, la <a href="/privacypolicy/" class="marketing-text--white">política de privacidad</a>, y la <a href="/cookies/" class="marketing-text--white">política de cookies</a> de Eventbrite, así como recibir comunicaciones de marketing de Eventbrite.</p>
                <p class="marketing-text-body-small marketing-text-body--faint l-block-3">¿Ya eres miembro? <a href="/login" class="marketing-text--white">Inicia sesión</a></p>
            </div>
        </div>
        <!-- END: Sign up Form -->

        <!-- Hero Headline and subline (Hidden on small and medium screens) -->
        <div class="g-cell g-cell-12-12 g-cell-md-12-12 g-cell-lg-8-12 hide-small hide-medium">
            <div class="l-block--padded-v-60 l-padded-h-4">
                <h1 class="marketing-text-heading-epic marketing-text--white">Registro de eventos en línea</h1>
                <p class="marketing-text-heading-secondary marketing-text--white hide-small">Crea una página del evento personalizada. Promociona tu evento y haz un seguimiento de la asistencia. Vende entradas y gestiona los registros.</p>
            </div>
        </div>
        <!-- END: Hero Headline and subline -->
    </div>
</section>
<!-- END: Landing Page Hero (with full-width background) -->


<!-- Landing Page Section with light background with a top border -->
<section class="g-group g-group--full-width l-block--bg-light l-border--top">
    <div class="g-grid l-block--padded-v-60">
        <div class="g-group">
            <div class="g-cell g-cell-12-12 text--centered">
                <h3 class="marketing-text-heading-primary">Te proporcionamos todas las herramientas que necesitas para </br>vender entradas para tu evento.</h3>
                <h4 class="marketing-text-heading-secondary marketing-text-body--faint">Eventbrite te permite planificar cualquier evento, hacerle un seguimiento y promocionarlo.</h4>
            </div>
        </div>
         <!-- Feature List -->
        <div class="g-group">
            <ul class="l-block-4 text--centered">
                <li class="g-cell g-cell-12-12 g-cell-md-6-12 g-cell-lg-4-12 l-padded-v-4">
                    <i class="ico-hurry ico--xlarge ico--color-understated"></i>
                    <h2 class="marketing-text-heading-secondary l-block-3">Publica un evento en solo unos minutos</h2>
                    <p class="marketing-text-body-medium marketing-text-body--faint">¡Es muy fácil organizar festivales, espectáculos, recogidas de fondos, conferencias, fiestas, talleres y eventos de todo tipo!</p>
                </li>
                <li class="g-cell g-cell-12-12 g-cell-md-6-12 g-cell-lg-4-12 l-padded-v-4">
                    <i class="ico-settings ico--xlarge ico--color-understated"></i>
                    <h2 class="marketing-text-heading-secondary l-block-3">Personaliza la página de tu evento</h2>
                    <p class="marketing-text-body-medium marketing-text-body--faint">Controla el aspecto de la página de tu evento. Además puedes ofrecer múltiples tipos de entradas, códigos descuento, promociones comerciales y mucho más.</p>
                </li>
                <li class="g-cell g-cell-12-12 g-cell-md-6-12 g-cell-lg-4-12 l-padded-v-4">
                    <i class="ico-credit-card ico--xlarge ico--color-understated"></i>
                    <h2 class="marketing-text-heading-secondary l-block-3">Permite a tus asistentes pagar por Internet</h2>
                    <p class="marketing-text-body-medium marketing-text-body--faint">Cobra el dinero fácilmente mediante el procesamiento de tarjetas de crédito, Paypal y mucho más. Registra los pagos y gestiona los reembolsos en un mismo lugar.</p>
                </li>
                <li class="g-cell g-cell-12-12 g-cell-md-6-12 g-cell-lg-4-12 l-padded-v-4">
                    <i class="ico-friends ico--xlarge ico--color-understated"></i>
                    <h2 class="marketing-text-heading-secondary l-block-3">Corre la voz</h2>
                    <p class="marketing-text-body-medium marketing-text-body--faint">Elige entre una variedad de herramientas promocionales para informar a la gente sobre tu evento, incluyendo widgets, enlaces personalizados, invitaciones, redes sociales y mucho más.</p>
                </li>
                <li class="g-cell g-cell-12-12 g-cell-md-6-12 g-cell-lg-4-12 l-padded-v-4">
                    <i class="ico-tickets ico--xlarge ico--color-understated"></i>
                    <h2 class="marketing-text-heading-secondary l-block-3">Gestiona las entradas el día del evento</h2>
                    <p class="marketing-text-body-medium marketing-text-body--faint">Convierte tu smartphone en un escáner de entradas en la aplicación Entry Manager para iPhone y Android.</p>
                </li>
                <li class="g-cell g-cell-12-12 g-cell-md-6-12 g-cell-lg-4-12 l-padded-v-4">
                    <i class="ico-chart ico--xlarge ico--color-understated"></i>
                    <h2 class="marketing-text-heading-secondary l-block-3">Registra el progreso en tiempo real</h2>
                    <p class="marketing-text-body-medium marketing-text-body--faint">Mantente organizado mediante el acceso inmediato a informes y análisis. Observa la evolución de tus ventas de entradas y registros en tiempo real.</p>
                </li>
            </ul>
        </div>
        <!-- END: Feature List -->
    </div>
</section>
<!-- END: Landing Page Section -->


