<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Registro';
// $this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
  <div class="col-sm-6 col-md-4">
  </div>
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="panel panel-green">
  <center class="panel-heading"><h3>Crear una cuenta</h3></center>
  <div class="panel-body">
 
      
      <div class="caption">
        
        <p>Por favor, rellene los siguientes campos para inscribirse:</p>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <?= $form->field($model, 'username') ?>
                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'captcha')->widget(Captcha::className()) ?>
                    <div class="form-group">
                        <?= Html::submitButton('Crear cuenta', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        
        <p style="font-size:10px;">Para solicitar una cuenta, por favor, póngase en contacto con sus administradores.</p>
      </div>
     </div>
</div>


  </div>
  <div class="col-sm-6 col-md-4">
    <div class="">
      
    </div>
  </div>
</div>

