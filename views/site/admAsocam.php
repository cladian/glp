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

    <button class="btn btn-primary" type="button"> Usuarios Activos <span class="badge"><?= $activeUsers; ?></span></button>
    <button class="btn btn-primary" type="button"> Eventos Activos <span class="badge"><?= $activeEvents; ?></span></button>
    <button class="btn btn-primary" type="button"> Inscripciones Activos <span class="badge"><?= $activeInscriptions; ?></span></button>



    <?= Html::a('Actualizar datos de Perfil', ['/profile/createown'], ['class' => 'btn btn-success']) ?>



    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>


