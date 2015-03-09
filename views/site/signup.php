<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
  <div class="col-sm-6 col-md-4">
  </div>
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="thumbnail">
      
      <div class="caption">
        <center><h1><?= Html::encode($this->title) ?></h1></center>
        <p>Por favor, rellene los siguientes campos para inscribirse:</p>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <?= $form->field($model, 'username') ?>
                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <div class="form-group">
                        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <p>Para solicitar una cuenta, por favor, póngase en contacto con sus administradores.</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="">
      
    </div>
  </div>
</div>

