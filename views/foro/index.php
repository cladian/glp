<?php
use yii\helpers\Html;

use app\models\PhforumDocument;
use app\models\PhforumImagens;
use app\models\Topic;


use app\models\Document;
use app\models\Imagen;

?>
<?php
// Mensaje de error si no existen Foros activos
if (!$model):?>
<div class="panel panel-primary">
    <div class="panel-heading">No existen Foros Activos</div>
    <div class="panel-body">
       <p>Estimado participante, no existen foros activos en este momento.</p>


    </div>
</div>
<?php endif; ?>

<?php
// Iterador por cada foro activo.
foreach ($model as $foro) {

    ?>
    <div class="panel panel-primary">
        <div class="panel-heading"><?= $foro->name; ?>
            <?php
            // Boton visible para asocam
                if (Yii::$app->user->can('asocam')) {
                    echo Html::a(\Yii::$app->params['btnUpdateForo'], ['/phforum/view', 'id' => $foro->id], ['class' => 'btn btn-xs btn-default pull-right']);
                }
                ?>

        </div>
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
                            <blockquote> <?= $foro->event->name; ?></blockquote>
                        </div>
                        <?php
                        $countdocs=1;
                        if ($foro->getPhforumDocuments()->count() > 0): ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-group-justified" data-toggle="dropdown" aria-expanded="false">
                                Documentos disponibles <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <?php foreach ($foro->getPhforumDocuments()->all() as $documents): ?>
                                    <li > <?= Html::a($countdocs++.'.-'.$documents->document->name, \Yii::$app->params['foroDocs'] . $documents->document->file,['target'=>'_blank'] ); ?></li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>

                        <?php endif ?>

                        <?php if ($foro->getPhforumImagens()->count() > 0): ?>
                            <hr/>
                            <ul class="list-group">
                                <?php foreach ($foro->getPhforumImagens()->all() as $imagenes): ?>
                                    <li class="list-group-item"> <?= Html::img(\Yii::$app->params['foroImgs'] . $imagenes->imagen->file, ['class' => 'img-responsive']); ?></li>
                                <?php
                                endforeach;
                                ?>
                            </ul>

                        <?php endif ?>

                        <!--<h4>Videos</h4>

                        <div class="bs-example" data-example-id="responsive-embed-16by9-iframe-youtube">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="//www.youtube.com/embed/iFyp1P_NsMI?rel=0"
                                        allowfullscreen></iframe>
                            </div>
                        </div>-->

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
                                <?php foreach (\app\models\Topic::find()->where(['phforum_id' => $foro->id])->orderby('created_at desc')->all() as $topic): ?>
                                    <?php if (($topic->status ==Topic::STATUS_ACTIVE)||($topic->status ==Topic::STATUS_INACTIVE)) :?>
                                    <tr>
                                        <td><?= $topic->id; ?></td>
                                        <td><?= $topic->content; ?></td>
                                        <td><?= $topic->user->username; ?></td>
                                        <td><?= Yii::$app->formatter->asDate($topic->created_at, 'medium'); ?></td>
                                        <td><?= Html::a('<span class="badge">' . $topic->getPosts()->count() . '</span> Aportes', ['foro/topic', 'id' => $topic->id], ['class' => 'btn btn-primary btn-xs']) ?></td>
                                    </tr>
                                <?php
                                    endif;
                                    endforeach; ?>
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

