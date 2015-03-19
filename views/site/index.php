<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



/* @var $this yii\web\View */
$this->title = 'My Yii Application';

?>


<!-- copia -->
<!-- Landing Page Hero (with full-width background) -->
<section class="slide">
    <center class="caja-slide">
        <div class="hidden-xs hidden-lg hidden-md col-xs-7 col-sm-7 col-md-7 col-lg-7">
            <div class="caja-slide">
                <h1 class="tituto-slide">Bienvenidos</h1>

                <p class="texto-slide">Al sistema de Registro de Participantes ASOCAM, a tavés de este sistema podrá
                    registrarse y
                    acceder a la información, materiales y demás cursos disponibles para los participantes de los
                    eventos
                    regionales</p>
            </div>
        </div>
    </center>
    <!-- ingreso -->

    <!-- Sign up Form -->
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
        <br>

        <div class="caja">
            <div class="panel-heading"><h2 class="titulo-registro">Registrarse</h2></div>
            <div class="panel-body">

                <!-- form -->
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <!--            <form name="signupForm" method="post" action="/signup?nomo=1" class="responsive-form marketing-form l-block-2 js-validate-signup">-->
                <!--                --><? //= $form->field($model, 'username') ?>
<!--                <div class="responsive-form__input--icon responsive-form__input--icon--bg l-block-2">-->
                    <?=
                    $form->field($model, 'username', [
                        'inputOptions' => ['placeholder' => 'Usuario'],
                        'inputTemplate' => '<div class="input-group"><span class="input-group-addon"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> </span>{input}</div>'
                    ])->label(false);
                    ?>
<!--                </div>-->
<!--                --><?//= $form->field($model, 'email') ?>
                <?=$form->field($model, 'email', [
                    'inputOptions' => ['placeholder' => 'Email'],
                    'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>   </span>{input}</div>'
                ])->label(false);
                ?>

<!--                --><?//= $form->field($model, 'password')->passwordInput() ?>
                <?=
                $form->field($model, 'password', [
                    'inputOptions' => ['placeholder' => 'Contraseña'],
                    'inputTemplate' => '<div class="input-group"><span class="input-group-addon"> <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> </span>{input}</div>'
                ])->label(false)->passwordInput();
                ?>
<!--                --><?//= $form->field($model, 'captcha')->widget(Captcha::className()) ?>
                <div class="form-group">
                    <?= Html::submitButton('Crear cuenta', ['class' => 'btn-lg btn-success btn-block ', 'name' => 'signup-button']) ?>
                </div>
<!--menu html-->
<!--menu html-->
<!--menu html-->
<!--menu html-->
<!--menu html-->
                <!-- Hidden input fields... signup_page value is page specific -->
<!--                <input type="hidden" name="signup_page" value="es_registration-online">-->
<!--                <input type="hidden" name="submitted" value="1">-->
<!--                <input type="hidden" name="forward" value="/create">-->
<!--                <!-- END: Hidden input fields... signup_page value is page specific -->
<!---->
<!--                <div class="responsive-form__input--icon responsive-form__input--icon--bg l-block-2">-->
<!--                    <input type="password" name="passwd1" placeholder="Nombre de Usuario"/>-->
<!--                </div>-->
<!--                <br>-->
<!---->
<!--                <div class="responsive-form__input--icon responsive-form__input--icon--bg">-->
<!--                    <input class="glyphicon glyphicon-align-left" type="email" name="email" placeholder="Email"/>-->
<!--                </div>-->
<!--                <br>-->
<!---->
<!--                <div class="responsive-form__input--icon responsive-form__input--icon--bg l-block-2">-->
<!--                    <input type="password" name="passwd1" placeholder="Contraseña"/>-->
<!--                </div>-->
<!--                <br>-->
<!--                <input type="submit" class="btn btn-success btn-lg btn-block" value="Registrarse">-->
                <?php ActiveForm::end(); ?>
                <!--            </form>-->
                <!-- end form -->
                <div>
                    <p style="text-align:center; padding-top: 0px;" class="texto-info">Al hacer clic en "Crear cuenta",
                        confirma que acepto los términos de servicio, la política de privacidad, y la política de
                        cookies de ASOCAM, así como recibir comunicaciones de marketing de ASOCAM.</p>

                    <div class="form-group">
<!--                        --><?//= Html::submitButton('Inicia sesión', ['class' => ' btn-primary  ', 'name' => 'signup-button']) ?>
                    </div>

                    <p class="aviso">¿Si eres miembro? <a <?php Html::a('/site/login')?> class="marketing-text--white"><?= Html::submitButton('Inicia sesión', ['class' => ' btn-danger  ', 'name' => 'signup-button']) ?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Sign up Form -->
    <!-- end ingreso -->

    <!-- Hero Headline and subline (Hidden on small and medium screens) -->
    <div style="text-align:justify; padding-top: 60px;"
         class="hidden-xs hidden-sm col-xs-12 col-sm-12 col-md-7 col-lg-7">
        <div class="caja-slide">
            <h1 class="tituto-slide">Bienvenidos</h1>

            <p class="texto-slide">Al sistema de Registro de Participantes ASOCAM, a tavés de este sistema podrá
                registrarse y
                acceder a la información, materiales y demás cursos disponibles para los participantes de los eventos
                regionales</p>
        </div>
    </div>
    <!-- END: Hero Headline and subline -->


    <!-- Ingreso y Registro -->
    <div class=" hidden-xs hidden-md hidden-sm hidden-lg site-index">

        <div class="jumbotron">
            <h1>Bienvenidos</h1>
            <code class="lead"><?= Yii::$app->formatter->asDate(date('Y-m-d'), 'long') ?></code>

            <p class="lead">Al sistema de Registro de Participantes ASOCAM, a tavés de este sistema podrá registrarse y
                acceder a la información, materiales y demás cursos disponibles para los participantes de los eventos
                regionales</p>


</section>
<!-- END: Landing Page Hero (with full-width background) -->


<!-- end copia -->


<!-- eventos -->
<section style="padding-top: 20px;">

    <div class="panel panel-default">
        <div class="panel-heading"><h4 class="text-large">Próximos eventos</h4></div>
        <div class="panel-body">
            <!-- panel-interno -->



            <?php // Begin foreach
            foreach ($modelEvent as $event) {
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <center>

                                <?= Html::img('imgs/flags/' . strtolower($event->country->iso) . '.png', ['class' => 'img-responsive']); ?>
                                <h3><?= $event->city . ', ' . $event->country->name; ?></h3></center>


                        </div>
                        <div class="panel-body">

                            <i style="color:#999; padding-right:1px;" class="glyphicon glyphicon-time"></i> <strong
                                class="event-text">Inicia: </strong><?= Yii::$app->formatter->asDate($event->begin_at, 'long'); ?>
                            <br>
                            <i style="color:#999; padding-right:1px;" class="glyphicon glyphicon-time"></i> <strong
                                class="event-text">Finaliza: </strong><?= Yii::$app->formatter->asDate($event->end_at, 'long'); ?>
                            <br><br>
                            <?= Html::img($event->getImageUrl(), ['class' => 'img-d-retina']); ?>


                        </div>
                        <div class="panel-footer">
                            <?= Html::a('Más información', ['site/event/', 'id' => $event->id], ['class' => 'btn btn-success btn-lg btn-block']) ?>
                        </div>
                    </div>
                </div>
            <?php } // End ForEach ?>


        </div>
        <!-- end panel interno -->
    </div>


</section>
<!-- eventos -->
<!-- relleno -->
<!-- <section>
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

</section> -->
<!-- end relleno -->