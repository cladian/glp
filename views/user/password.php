<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Actualziar Usuario: ' . ' ' . $model->id;

?>
<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/site/index'], ['class' => 'btn btn-default'])?>
</div>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
  </div>
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="panel panel-primary">
  <center class="panel-heading"><h3>Actualización de Usuario</h3></center>
  <div class="panel-body">
 
      
      <div class="caption">
        
        <p>Por favor, rellene los siguientes:</p>
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
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
    <div class="">
      
    </div>
  </div>
</div>




