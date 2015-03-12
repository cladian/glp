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

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">Historial de respuestas</div>
        <div class="panel-body">
            <ul class="bs_timeline">
                <?php
                $contador = 0;

                foreach ($modelReply as $reply) {
                    $clase = '';
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
                                <p><small class="text-muted"><i class="fa fa-clock-o"></i> <?= Yii::$app->formatter->asDate($reply->created_at, 'long'); ?></small>
                                </p>
                            </div>
                            <div class="timeline-body">
                                <p><?= $reply->text; ?></p>
                                <?= $reply->user->username ?>
                            </div>
                        </div>
                    </li>

                  
                <?php
                }
                ?>







                <li>
                    <div class="timeline-panel">
                        <div class="timeline-copy">
                            <h5 class="timeline-title">Responsive Timeline (w/ Bootstrap)</h5>

                            <p style="margin-top: 14px;"><a
                                    href="http://alexwhinfield.co.uk/responsive-css-timeline-twitter-bootstrap/"
                                    title="Grab the source code"><span class="label label-success">Built by Alex Whinfield</span></a>
                            </p>
                        </div>
                    </div>
                    <div class="timeline-badge"><i class="glyphicon glyphicon-envelope"></i></div>
                </li>

                <li class="timeline-right">
                    <div class="timeline-panel">
                        <div class="timeline-copy">
                            <h5 class="timeline-title">Eiusmod Tempor Incididunt</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip.</p>
                        </div>
                    </div>
                    <div class="timeline-badge warning"><i class="glyphicon glyphicon-user"></i></div>
                </li>

                <li class="timeline-right">
                    <div class="timeline-panel">
                        <div class="timeline-copy">
                            <h5 class="timeline-title">Eiusmod Tempor Incididunt</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip.</p>
                        </div>
                    </div>
                    <div class="timeline-badge warning"><i class="glyphicon glyphicon-user"></i></div>
                </li>

                <li class="timeline-right">
                    <div class="timeline-panel">
                        <div class="timeline-copy">
                            <h5 class="timeline-title">Eiusmod Tempor Incididunt</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip.</p>
                        </div>
                    </div>
                    <div class="timeline-badge warning"><i class="glyphicon glyphicon-user"></i></div>
                </li>

                <li class="timeline-right">
                    <div class="timeline-panel">
                        <div class="timeline-copy">
                            <h5 class="timeline-title">Eiusmod Tempor Incididunt</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip.</p>
                        </div>
                    </div>
                    <div class="timeline-badge warning"><i class="glyphicon glyphicon-user"></i></div>
                </li>


            </ul>
        </div>
    </div>




