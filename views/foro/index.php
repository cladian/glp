<?php
use yii\helpers\Html;

use app\models\PhforumDocument;
use app\models\PhforumImagens;


use app\models\Document;
use app\models\Imagen;


?>

<div class="row">
    <!--<center>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-primary btn-lg active">
          <span style="font-size:30px;"class="glyphicon glyphicon-comment" aria-hidden="true"></span> <br> <hr>
        <input type="radio" name="options" id="option1" autocomplete="off" checked> Foro
      </label>
      <label class="btn btn-primary btn-lg">
          <span style="font-size:30px;"class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> <br> <hr>
        <input type="radio" name="options" id="option2" autocomplete="off">
      </label>
      <label class="btn btn-primary btn-lg">
          <span style="font-size:30px;"class="glyphicon glyphicon-play" aria-hidden="true"></span> <br> <hr>
        <input type="radio" name="options" id="option3" autocomplete="off"> Multimendia
      </label>
      <label class="btn btn-primary btn-lg">
          <span style="font-size:30px;"class="glyphicon glyphicon-align-left" aria-hidden="true"></span> <br> <hr>
        <input type="radio" name="options" id="option3" autocomplete="off"> Mensajes
      </label>
    </div>
    </div>
    </center>-->
</div>
<br>

<?php
foreach ($model as $foro) {

    ?>
    <div class="panel panel-primary">
        <div class="panel-heading"><?= $foro->name; ?></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <!-- Large modal -->
                        <!--                        <button type="button" class="btn btn-primary" data-toggle="modal"-->
                        <!--                                data-target=".bs-example-modal-lg">Large modal-->
                        <!--                        </button>-->
                        <div>
                            <h4>Información del evento</h4>
                            <?= $foro->event->name; ?>
                        </div>


                        <?php if ($foro->getPhforumDocuments()->count() > 0): ?>
                            <h4>Documentos</h4>
                            <ul class="list-group">
                                <?php foreach ($foro->getPhforumDocuments()->all() as $documents): ?>
                                    <li class="list-group-item glyphicon glyphicon-download"> <?= Html::a($documents->document->name, \Yii::$app->params['foroDocs'] . $documents->document->file); ?></li>
                                <?php
                                endforeach;
                                ?>
                            </ul>

                        <?php endif ?>

                        <?php if ($foro->getPhforumImagens()->count() > 0): ?>
                            <h4>Imagenes</h4>
                            <ul class="list-group">
                                <?php foreach ($foro->getPhforumImagens()->all() as $imagenes): ?>
                                    <li class="list-group-item"> <?= Html::img(\Yii::$app->params['foroImgs'] . $imagenes->imagen->file, ['class' => 'img-responsive']); ?></li>
                                <?php
                                endforeach;
                                ?>
                            </ul>

                        <?php endif ?>

                        <h4>Videos</h4>

                        <div class="bs-example" data-example-id="responsive-embed-16by9-iframe-youtube">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="//www.youtube.com/embed/iFyp1P_NsMI?rel=0"
                                        allowfullscreen></iframe>
                            </div>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                        <div class="media">

                            <div class="media-body">

                                <blockquote>
                                    <h4 class="media-heading">Contenido</h4>

                                    <p><?= $foro->content; ?></p>
                                </blockquote>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tema</th>
                                    <th>por</th>
                                    <th>fecha</th>
                                    <th>ver</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach (\app\models\Topic::find()->where(['phforum_id' => $foro->id])->all() as $topic):?>

                                    <tr>
                                        <td><?= $topic->id; ?></td>
                                        <td><?= $topic->content; ?></td>
                                        <td><?= $topic->user->username; ?></td>
                                        <td><?= Yii::$app->formatter->asDate($topic->created_at, 'medium'); ?></td>
                                        <td><?= Html::a('<span class="badge">'.$topic->getPosts()->count().'</span> Aportes', ['foro/topic', 'id' => $topic->id], ['class' => 'btn btn-default btn-xs']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--        <div class="panel-footer">
            <? /*= Html::a('<span class="badge">2</span> Temas', ['foro/topic', 'id' => $foro->id], ['class' => 'btn btn-default']) */ ?>
            <? /*= Html::a('<span class="badge">2</span> Temas', ['foro/topic', 'id' => $foro->id], ['class' => 'btn btn-default']) */ ?>
            <? /*= Html::a('<span class="badge">2</span> Temas', ['foro/topic', 'id' => $foro->id], ['class' => 'btn btn-default']) */ ?>
            <? /*= Html::a('<span class="badge">2</span> Temas', ['foro/topic', 'id' => $foro->id], ['class' => 'btn btn-default']) */ ?>
            <? /*= Html::a('<span class="badge">2</span> Temas', ['foro/topic', 'id' => $foro->id], ['class' => 'btn btn-default']) */ ?>
            <button class="btn btn-primary" type="button">
                Temas <span class="badge">2</span>
            </button>
            <button class="btn btn-primary" type="button">
                Aportes <span class="badge">5</span>
            </button>
            <button class="btn btn-primary" type="button">
                Comentarios <span class="badge">10</span>
            </button>
        </div>-->

    </div>

<?php

}
?>

