<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="container">
<div class="error">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

        <h1 class="error-titulo"><?= Html::encode($this->title) ?></h1>

        <div class="alerta">
            <?= nl2br(Html::encode($message)) ?>
        </div>
        Regresar a la página de <span class="glyphicon glyphicon-home"> INICIO</span>
    </div>



    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <?= Html::img('imgs/error/400.png'); ?>
    </div>
    
</div>
</div>