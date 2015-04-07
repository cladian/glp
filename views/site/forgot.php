<?php
$this->pageTitle=Yii::app()->name . ' - Recuperar Contraseña';
$this->breadcrumbs=array(
    'Recuperar contraseña',
);
?>
<div id="overview" class="section">
    <div class="post-wrap padd-y-50 boxed">
        <?php if(Yii::app()->user->hasFlash('forgot')): ?>

            <div class="flash-success">
                <?php echo Yii::app()->user->getFlash('forgot'); ?>
            </div>

        <?php else: ?>

            <div class="form">
                <p>Ingrese el correo electrónico registrado, el sistema enviará automáticamente un correo electrónico al correo registrado con los datos de acceso</p>

                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'forgot-form',
                    'enableClientValidation'=>true,
                    'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                    ),
                )); ?>

                <div class="row">
                    e-mail : <input name="Lupa[email]" id="ContactForm_email" type="email">
                </div>

                <div class="row buttons">
                    <?php echo CHtml::submitButton('Enviar'); ?>
                </div>

                <?php $this->endWidget(); ?>

            </div><!-- form -->

        <?php endif; ?>
    </div>
</div>