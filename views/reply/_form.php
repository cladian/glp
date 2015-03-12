<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;
use app\models\Request;

/* @var $this yii\web\View */
/* @var $model app\models\Reply */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="panel panel-primary">
  <div class="panel-heading">Crear Respuesta</div>
  <div class="panel-body">



<div class="reply-form">
    
    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <!--    --><? //= $form->field($model, 'created_at')->textInput() ?>
    <!---->
    <!--    --><? //= $form->field($model, 'updated_at')->textInput() ?>

    <!--    --><? //= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList($model->getStatusList()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>

</div>

  </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <div class="panel panel-green">
        <div class="panel-heading">
            <i class="fa fa-clock-o fa-fw"></i> Historial
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <ul class="timeline">
                <?php
                $contador = 0;

                foreach ($modelReply as $reply) {
                    $clase = 'class=timeline-inverted';
                    if ($contador++ & 1)
                        $clase = 'class=timeline-right';
                    ?>
                    <li <?= $clase; ?>>
                        <div class="timeline-badge">
                            <?= Html::img($reply->user->getImageUrl(), ['class' => 'img-circle', 'style' => 'height:50px;']); ?>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <!--  <h4 class="timeline-title">Lorem ipsum dolor</h4>-->

                                    <small class="text-muted"><i class="glyphicon glyphicon-time"></i> <?= Yii::$app->formatter->asDate($reply->created_at, 'long'); ?>
                                    </small>

                            </div>
                            <div class="timeline-body">
                                <p><?= $reply->text; ?></p>

                                <span class="label label-success"><?= $reply->user->username ?></span>
                            </div>
                        </div>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <!-- /.panel-body -->
    </div>

</div>

