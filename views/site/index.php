<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Sistema de Gestión de Participantes';

?>


<!-- Eventos -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading"><h4>Eventos próximos a realizarse
              <?= Html::a('Registrarme', ['site/signup/'], ['class' => 'btn btn-md btn-success pull-right']) ?>
          <!--    --><?/*= Html::a('Ingresar', ['site/login/'], ['class' => 'btn btn-md btn-success pull-right']) */?>
          </h4>

      </div>
      <div class="panel-body">
        <?php  // Begin ForEach
                foreach ($modelEvent as $event) {
                    ?>

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <?= Html::img($event->getImageUrl(), ['class' => 'img-responsive figure']); ?>
                            <div class="caption">
                                <h3><?= $event->name; ?></h3>

                                <!-- <p><?= $event->short_description; ?></p> -->
                                <address>
                                    <strong><?= $event->city . ', ' . $event->country->name; ?></strong><br>
                                    <strong>Inicia: </strong><?= Yii::$app->formatter->asDate($event->begin_at, 'long'); ?>
                                    <br>
                                    <strong>Finaliza: </strong><?= Yii::$app->formatter->asDate($event->end_at, 'long'); ?>
                                    <br>
                                    <strong>Inversión: </strong><?= $event->cost; ?> USD
                                </address>
                                <p>
                                    <?= Html::a('Más información', ['site/event/', 'id' => $event->id], ['class' => 'btn  btn-primary']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php }  // End ForEach ?>
             
      </div>
    </div>
</div>

<!-- END Eventos -->

