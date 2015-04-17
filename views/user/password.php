<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Actualizar Usuario ' . ' ' ;

?>

<div class="breadcrumb">
    <?= Html::a(\Yii::$app->params['btnCancel'], [ '/site/index', 'id'=>$model->id], ['class' => 'btn btn-danger']) ?>


    <!-- AYUDA-->
<!--    --><?php
//    Modal::begin([
//        'header' => '<h4>Inscripción</h4>',
//        'toggleButton' => ['label' => \Yii::$app->params['btnHelp'], 'class' => 'btn btn-default pull-right'],
//    ]);
//
//    echo $this->render('/help/inscription-index');
//    Modal::end();
//    ?>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
  </div>
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="panel panel-primary">
  <center class="panel-heading"><h3>Actualización de Contraseña</h3></center>
  <div class="panel-body">


      <div class="caption">

        <p>Por favor, actualice su contraseña:</p>
        <hr>
        <div class="row">
            <div class="col-lg-12">
              <?= $this->render('_password', [
			        'model' => $model,
			    ]) ?>
            </div>
        </div>
        <br>
        <p style="font-size:10px;">Para solicitar una cuenta, por favor, póngase en contacto con sus administradores.</p>
      </div>
     </div>
</div>


  </div>
  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
    <div class="">

    </div>
  </div>
</div>




