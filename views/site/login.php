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
            <center class="panel-heading"><h4>Ingresar a su cuenta</h5></center>
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
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <?= Html::submitButton('Iniciar sesión', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                <span class="form-group">
                       <?= Html::a('Recuperar contraseña', ['/site/forgot'], ['class' => 'btn btn-default']) ?>
                            </div>


                            <div class="col-lg-12">
                                <hr>
                                <p>¿No dispones de una cuenta?</p>
                    <span class="form-group">
                        <?= Html::a('Regístrate ahora', ['site/signup']) ?>
                    </span>

                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                        <br>

                        <p style="font-size:10px;">Para solicitar una cuenta, por favor, póngase en contacto con sus
                            administradores.</p>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-sm-6 col-md-4">
            <div class="">

            </div>
        </div>
    </div>

