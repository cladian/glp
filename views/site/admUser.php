<?php
use yii\helpers\Html;
use kartik\widgets\Growl;

/* @var $this yii\web\View */
$this->title = 'Panel de control de usuario';
$this->params['breadcrumbs'][] = $this->title;

// http://demos.krajee.com/widget-details/growl

if (!$hasProfile){
    echo Growl::widget([
        'type' => Growl::TYPE_WARNING,
        'title' => 'Perfil de usario incompleto',
        'icon' => 'glyphicon glyphicon-exclamation-sign',
        'body' => 'Actualicelo inmediatamente',
        'showSeparator' => true,
        'delay' => 0,
        'pluginOptions' => [
            'placement' => [
                'from' => 'top',
                'align' => 'right',
            ]
        ]
    ]);


}
?>
<div class="site-about">
    <h3><?= Html::encode($this->title) ?></h3>



    <?= Html::a('Actualizar datos de Perfil', ['/profile/createown'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Inscripción', ['/inscription/createown'], ['class' => 'btn btn-success']) ?>
    <div class="row">

        <div class="col-lg-4">
            <nav>
                <ul class="pager">
                    <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Anterior</a></li>
                    <li class="next"><a href="#">Siguiente <span aria-hidden="true">&rarr;</span></a></li>
                </ul>
            </nav>
            <h2>Gestión De proyectos </h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>


            <address>
                <strong>Twitter, Inc.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <abbr title="Phone">P:</abbr> (123) 456-7890
            </address>
            <p><a class="btn btn-default" href="Evento">Inscribirme</a></p>
        </div>
        <div class="col-lg-8">
            <h2>Mis inscripciones</h2>
            <p>componente</p>
            </div>
<!--        <div class="col-lg-4">
            <h2>Heading</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>

            <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
        </div>
        <div class="col-lg-4">
            <h2>Heading</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>

            <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
        </div>-->
    </div>



    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>


