<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>


<div class="container">
    <div class="jumbotron" style="background-image: url(); background-size: 98%; background-repeat: no-repeat;">
        <h1><span class="glyphicon glyphicon-ban-circle" aria-hidden="true" style="color: red;"></span> 403 Error</h1>

        <p class="lead"><?= nl2br(Html::encode($message)) ?><em><span id="display-domain"></span></em>.</p>

        <p>    <?= Html::a(\Yii::$app->params['btnRegresar'], ['/site/index'], ['class' => 'btn btn-default ']) ?>
        </p>
    </div>
</div>
<div class="container">
    <div class="body-content">
        <div class="row">
            <div class="col-md-6">
                <h2>¿Que ocurrio?</h2>


                <p>Es probable que esté intentando ingresara a una página que no existe ó no tiene permisos suficientes para acceder a éste recurso </p>
            </div>
            <div class="col-md-6">
                <h2>¿Que puedo hacer?</h2>



                <p>Por favor use el botón de retorno y verifique que se encuentra en el lugar correcto. Si necesita asistencia inmediata, por favor en envienos un correo electrónico (info@asocam.org)
                    </p>

            </div>
        </div>
    </div>
</div>