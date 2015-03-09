<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
  <div class="col-sm-6 col-md-4">
  </div>
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="thumbnail">
      
      <div class="caption">
        <center><h1><?= Html::encode($this->title) ?></h1></center>
        <p>Por favor, rellene los siguientes campos para iniciar sesión:</p>
        <hr>
        <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]); ?>

        <?= $form->field($model, 'username') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

       
        <?php ActiveForm::end(); ?>
        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
         <?= $form->field($model, 'rememberMe', [
            'template' => "<div class=\"col-lg-offset-1 col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ])->checkbox() ?>
        <p>Para solicitar una cuenta, por favor, póngase en contacto con sus administradores.</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="">
      
    </div>
  </div>
</div>

<div class="site-login">
    
    <div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>
</div>
