<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Ingreso';
// $this->params['breadcrumbs'][] = $this->title;
?>




<div class="row">
  <div class="col-sm-6 col-md-4">
  </div>
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="panel panel-primary">
  <center class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></center>
  <div class="panel-body">
 
      
      <div class="caption">
        
        <p>Por favor, rellene los siguientes campos para inscribirse:</p>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <?= $form->field($model, 'username') ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    <div class="form-group">
                        <?= Html::submitButton('Ingreso', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <p>Para solicitar una cuenta, por favor, póngase en contacto con sus administradores.</p>
      </div>
     </div>
</div>


  </div>
  <div class="col-sm-6 col-md-4">
    <div class="">
      
    </div>
  </div>
</div>

