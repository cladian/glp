<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\chartjs\ChartJs;


/* @var $this yii\web\View */
$this->title = 'GLP-ASOCAM';

?>
<?php
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
    //echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
    echo '<div class="alert alert-' . $key . '" role="alert">
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  ' . $message . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
             </div>';
}
?>

<!-- copia -->
<!-- Landing Page Hero (with full-width background) -->
<section class="slide">

    <!-- ingreso -->

    <!-- Sign up Form -->
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">

        <div class="caja">
            <div class="panel-heading"><h2 class="titulo-registro"> Registro</h2></div>
            <div class="panel-body">

                <!-- form -->
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?=
                $form->field($model, 'username', [
                    'inputOptions' => ['placeholder' => 'Usuario'],
                    'inputTemplate' => '<div class="input-group"><span class="input-group-addon"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> </span>{input}</div>'
                ])->label(false);
                ?>
                <?= $form->field($model, 'email', [
                    'inputOptions' => ['placeholder' => 'Email'],
                    'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>   </span>{input}</div>'
                ])->label(false);
                ?>

                <?=
                $form->field($model, 'password', [
                    'inputOptions' => ['placeholder' => 'Contraseña'],
                    'inputTemplate' => '<div class="input-group"><span class="input-group-addon"> <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> </span>{input}</div>'
                ])->label(false)->passwordInput();
                ?>
                <!--                --><? //= $form->field($model, 'captcha')->widget(Captcha::className()) ?>

                    <?= Html::submitButton('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Crear una cuenta', ['class' => 'btn-lg btn-success btn-block ', 'name' => 'signup-button']) ?>

                <?php ActiveForm::end(); ?>
                <div>
                    <p style="text-align:center; padding-top: 0px;" class="texto-info">Al hacer clic en "Crear cuenta",
                        confirma y acepta los términos de servicio, la política de privacidad de ASOCAM, así como recibir comunicaciones y notificaciones desde el sistema.</p>

                    <div class="form-group">
                        <!--                        --><? //= Html::submitButton('Inicia sesión', ['class' => ' btn-primary  ', 'name' => 'signup-button']) ?>
                    </div>

                    <?= Html::a('<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Soy miembro, Ingresar', ['/site/login'], ['class' => 'btn btn-primary btn-block']) ?>
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
            <h1 class="tituto-slide"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Bienvenidos</h1>

            <p class="texto-slide">Al sistema de Registro de Participantes ASOCAM, a través de este registro podrá
                gestionar sus inscripciones a nuestra oferta de eventos regionales</p>
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

        <div class="panel-body">
            <!-- panel-interno -->



            <?php // Begin foreach
            foreach ($modelEvent as $event) {
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            <?= Html::img('imgs/flags/' . strtolower($event->country->iso) . '.png', ['class' => 'img-responsive pull-right']); ?>

                                <h4><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> &nbsp; <?= $event->city . ', ' . $event->country->name; ?> </h4>


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
        <div class="panel-footer">
            <h5 class="text-large">Próximos eventos</h5>
        </div>
        <!-- end panel interno -->
    </div>


</section>

<?php
/*echo Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Privacy Statement', ['/reports/mpdf-demo-1'], [
    'class'=>'btn btn-danger',
    'target'=>'_blank',
    'data-toggle'=>'tooltip',
    'title'=>'Will open the generated PDF file in a new window'
]);*/


?>

