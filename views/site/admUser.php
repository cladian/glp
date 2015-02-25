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
        'title' => 'Perfil de usuario',
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body' => 'Incompleto, actualicelo inmediatamente',
        'showSeparator' => true,
        'delay' => 5,
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



    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>


