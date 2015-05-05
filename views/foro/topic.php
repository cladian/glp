<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\PhforumDocument;
use app\models\PhforumImagens;
use app\models\Topic;
use kartik\widgets\FileInput;

use app\models\Document;
use app\models\Imagen;
use app\models\Phforum;
use app\models\Post;


?>

<div class="breadcrumb">


    <?= Html::a(\Yii::$app->params['btnRegresar'], ['/foro'], ['class' => 'btn btn-default']) ?>

</div>
<?php if ($model->status == Topic::STATUS_INACTIVE): ?>
    <div class="alert alert-warning" role="alert">El tema ha sido Inactivado</div>
<?php endif; ?>
<?php if ($model->status == Topic::STATUS_DELETED): ?>
    <div class="alert alert-danger" role="alert">El tema ha sido eliminado</div>
<?php endif; ?>
<?php if (
(
    ($model->phforum->status == phforum::STATUS_ACTIVE) || ($model->phforum->status == phforum::STATUS_INACTIVE)
)
&& (
    ($model->status == Topic::STATUS_ACTIVE) || ($model->status == Topic::STATUS_INACTIVE)
)
): ?>

<a name="sube"></a>
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
<a name="sube"></a>

<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
<div class="panel panel-primary">

<div class="panel-heading"><?= $model->phforum->name ?>
    <?php
    // Boton visible para asocam
    if (Yii::$app->user->can('asocam')) {
        echo Html::a(\Yii::$app->params['btnUpdateTopic'], ['/topic/view', 'id' => $model->id], ['class' => 'btn btn-xs btn-default pull-right']);
    }
    ?>

</div>

<div class=" panel-body">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php if ($model->getTopicImagens()->count() > 0){ ?>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <?php }else { ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php } ?>
                    <p style="text-align:justify;"> <?= $model->content; ?></p>
                    <?php
                    $countdocs = 1;
                    if ($model->getTopicDocuments()->count() > 0): ?>
                        <div class="btn-group ">
                            <br/>
                            <button type="button" class="btn btn-info dropdown-toggle btn-group-justified"
                                    data-toggle="dropdown" aria-expanded="false">
                                Documentos disponibles <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <?php foreach ($model->getTopicDocuments()->all() as $documents): ?>
                                    <li> <?= Html::a($countdocs++ . '.-' . $documents->document->name, Yii::$app->urlManager->baseUrl.'/'.\Yii::$app->params['foroDocs'] . $documents->document->file, ['target' => '_blank']); ?></li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>

                    <?php endif ?>
                </div>
                <?php if ($model->getTopicImagens()->count() > 0): ?>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                        <div class="pull-right">
                            <?php foreach ($model->getTopicImagens()->all() as $imagenes): ?>

                                <?= Html::img(Yii::$app->urlManager->baseUrl. '/' . \Yii::$app->params['foroImgs'] . $imagenes->imagen->file, ['class' => 'img-thumbnail pull-right']); ?>

                            <?php
                            endforeach;
                            ?>
                        </div>

                    </div>
                <?php endif ?>


            </div>
        </div>
    </div>

    <div class="panel-footer">
        EVENTO: <?= $model->phforum->event->name ?>
    </div>
</div>

<div class="panel panel-green">
    <div class="panel-heading">
        <a href="#baja" class="pull-right">
            <button type="button" class="glyphicon glyphicon-chevron-down btn btn-default btn-xs"></button>
        </a>
        Aportes recibidos
    </div>
    <div class="panel-body">
        <div class="bs-example" data-example-id="condensed-table">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>#</th>
                    <th></th>
                    <th>Aporte</th>
                    <th></th>
                    <th>usuario</th>
                </tr>
                </thead>
                <tbody>


                <?php
                $contador = 0;
                // Foreach 1
                foreach ($modelPostList as $post):
                    if ($post->status == Post:: STATUS_ACTIVE):
                        $class = '';
                        if ($contador++ % 2)
                            $class = 'info';
                        ?>

                        <tr class="<?= $class ?>">
                            <th scope="row"><h2><kbd> <?= $contador ?></kbd></h2></th>
                            <td></td>
                            <td colspan="2">

                                <p><?= $post->content; ?> </p>

                                <small><i
                                        class="glyphicon glyphicon-time"></i> <?= Yii::$app->formatter->asDatetime($post->created_at, 'long'); ?>

                                </small>

                                <br/>

                                <p>
                                    <?php foreach ($post->getpostDocuments()->all() as $postDocs): ?>
                                        <?= Html::a('Documento: ' . $postDocs->document->name, Yii::$app->urlManager->baseUrl.'/'.\Yii::$app->params['foroDocs'] . $postDocs->document->file, ['target' => '_blank', 'class' => 'btn btn-xs btn-default']); ?></li>


                                    <?php endforeach ?>
                                </p>

                            </td>

                            <td>
                                <p align="center"><?= Html::img(Yii::$app->urlManager->baseUrl . '/' . $post->user->getImageUrl(), ['class' => 'img-circle', 'style' => 'height:30px;']); ?></p>
                                <span class="label label-success"><?= $post->user->username ?></span>

                            </td>
                        </tr>
                    <?php
                    endif;
                endforeach; ?>
                </tbody>
            </table>


            <!--<nav>
                <ul class="pagination">
                    <li>
                        <a href="#" aria - label = "Previous" >
                        <span aria - hidden = "true" >&laquo;</span >
                </a >
            </li>
            <li><a href="#"> 1</a></li>
            <li><a href="#"> 2</a></li>
            <li><a href="#"> 3</a></li>
            <li><a href="#"> 4</a></li>
            <li><a href="#"> 5</a></li>
            <li>
                <a href="#" aria - label = "Next" >
                <span aria - hidden = "true" >&raquo;</span >
                </a >
            </li>
        </ul>
    </nav>-->
        </div>
    </div>
    <div class="panel-footer">
        <!-- Boton para bajar -->
        &nbsp;
        <a href="#sube" class="pull-right">
            <button type="button" class="glyphicon glyphicon-chevron-up btn btn-default btn-xs">
            </button>
        </a>

        <!-- END Boton para bajar -->
    </div>
</div>

<!----><?php //if (!Yii::$app->user->isGuest) { ?>
<?php

if ((!Yii::$app->user->isGuest) && ($model->phforum->status == phforum::STATUS_ACTIVE) && ($model->status == Topic::STATUS_ACTIVE)) {
    ?>
    <div class="panel panel-yellow">
        <div class="panel-heading">Nuevo Aporte</div>
        <div class="panel-body">

            <div class="post-form">
                <!--                    --><?php //$form = ActiveForm::begin(['enableAjaxValidation' => false]); ?>
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                <?= $form->field($modelPost, 'content')->textarea(['rows' => 6]) ?>

                <!--    --><? //= $form->field($model, 'status')->textInput() ?>
                <div class="alert alert-success" role="alert">
                    <p>Documentos</p>
                    <?= $form->field($modelDocument, 'name')->textInput(['maxlength' => 250]) ?>

                    <?=
                    // Usage with ActiveForm and model
                    $form->field($modelDocument, 'file')->widget(FileInput::classname(), [
                        'pluginOptions' => [
                            'showUpload' => false,
                            'showPreview' => false,
                            'showRemove' => true,
                            'browseClass' => 'btn btn-primary btn-block',
                            'browseLabel' => 'Explorar'
                        ],
                    ]);

                    ?>

                </div>

                <div class="form-group">
                    <?= Html::submitButton($modelPost->isNewRecord ? \Yii::$app->params['btnPublicar'] : \Yii::$app->params['btnGuardar'], ['class' => $modelPost->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
<?php } elseif (Yii::$app->user->isGuest) { ?>

    <div class="alert alert-warning" role="alert">
        <center>Inicia sesión y podrás debatir con otros usuarios e intercambiar opiniones, información, ideas,
            comentarios, etc.
        </center>
        <center>
            <br>
            <?= Html::a(\Yii::$app->params['btnIngreso'], ['/site/login'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(\Yii::$app->params['btnRegistro'], ['/site/signup'], ['class' => 'btn btn-success']) ?>
        </center>
    </div>

<?php
} else {
    ?>
    <div class="alert alert-danger" role="alert">
        <center>Los aportes han sido inhabilitados
        </center>

    </div>
<?php
} ?>
</div>

    <?php if (!Yii::$app->user->isGuest) { ?>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> Notificaciones
                    electrónicas
                </div>
                <div class="panel-body">


                    <!--                <p>--><? //= $model->user->notification; ?><!-- </p>-->
                    <p>Su perfil está configurado para el envio de notificaciones:
                        <b><?= $modelUser->getEmail($modelUser->notification); ?></p>

                    <?= Html::a('Modificar', ['/user/email'], ['class' => 'btn btn-default btn-xs']) ?></b>

                </div>
            </div>
        </div>

    <?php
    } ?>


<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
    <div class="panel panel-primary">
        <div class="panel-heading"><span class="glyphicon glyphicon-list-alt"></span> Útimos Aportes</div>
        <div class="panel-body">
            <?php foreach ($modellatest as $post): ?>
                <div>
                    <small><i
                            class="glyphicon glyphicon-time"></i> <?= Yii::$app->formatter->asDatetime($post->created_at, 'medium'); ?>
                    </small>
                </div>
                <div><p><?= substr($post->content, 0, 50); ?>... </p></div>


                <?= Html::a('Leer más ...', ['/foro/topic', 'id' => $post->topic_id], ['class' => 'btn btn-default btn-xs']) ?>
                <!--                <div>

                    <span class="label label-success"><? /*= $post->user->username */ ?></span>
                </div>-->

                <hr>
            <?php endforeach ?>


        </div>
    </div>
</div>


<a name="baja"></a>

<?php endif; ?>
