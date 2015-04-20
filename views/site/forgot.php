<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;



$this->title = 'Registro';
// $this->params['breadcrumbs'][] = $this->title;
?>

<?php
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
    //echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
    echo '<div class="alert alert-' . $key . '" role="alert">
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  ' . $message . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
             </div>';
}
?>
<div class="row">
  <div class="col-sm-6 col-md-4">
  </div>
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="panel panel-primary">
  <center class="panel-heading">Recuperar contraseña</center>
  <div class="panel-body">
 
      
      <div class="caption">
        
        <p>El sistema enviará automaticamente una notificación con los datos de acceso</p>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                    <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'captcha')->widget(Captcha::className()) ?>
                    <div class="form-group">
                        <?= Html::submitButton('Recuperar contraseña', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        
        <!--<p style="font-size:10px;">Para solicitar una cuenta, por favor, póngase en contacto con sus administrador al correo .</p>-->
      </div>
     </div>
</div>


  </div>
  <div class="col-sm-6 col-md-4">
    <div class="">
      
    </div>
  </div>
</div>

