<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\PhforumDocument;
use app\models\PhforumImagens;


use app\models\Document;
use app\models\Imagen;

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
<!--<div class="row">
    <center>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary btn-lg">
                    <span style="font-size:30px;" class="glyphicon glyphicon-comment" aria-hidden="true"></span> <br>
                    <hr>
                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Foro
                </label>
                <label class="btn btn-primary btn-lg active">
                    <span style="font-size:30px;" class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                    <br>
                    <hr>
                    <input type="radio" name="options" id="option2" autocomplete="off"> Documentos
                </label>
                <label class="btn btn-primary btn-lg">
                    <span style="font-size:30px;" class="glyphicon glyphicon-play" aria-hidden="true"></span> <br>
                    <hr>
                    <input type="radio" name="options" id="option3" autocomplete="off"> Multimendia
                </label>
                <label class="btn btn-primary btn-lg">
                    <span style="font-size:30px;" class="glyphicon glyphicon-align-left" aria-hidden="true"></span> <br>
                    <hr>
                    <input type="radio" name="options" id="option3" autocomplete="off"> Mensajes
                </label>
            </div>
        </div>
    </center>
</div>
<br>-->

<!--<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
    <div class="panel panel-primary">
        <div class="panel-heading">Panel heading without title</div>
        <div class="panel-body">
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>-->
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
    <div class="panel panel-primary">
        <div class="panel-heading"><?= $model->phforum->name . $model->id; ?></div>
        <div class="panel-body">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <table class="table table-condensed">
                    <tr>
                        <td class="active"><?= $model->content; ?>
                        </td>
                    </tr>

                </table>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <table class="table table-condensed">
                    <tr>
                        <center>
                            <a href=""><span style="font-size:20px;"
                                             class="glyphicon glyphicon-circle-arrow-down"></span><br>

                                <div>Descargar</div>
                            </a>
                            <hr>
                        </center>
                    </tr>
                    <tr>
                        <center>
                            <a href=""><span style="font-size:20px;"
                                             class="glyphicon glyphicon-circle-arrow-down"></span><br>

                                <div>Descargar</div>
                            </a>
                            <hr>
                        </center>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


    <!--   APORTES -->

    <div class="panel panel-primary">
        <div class="panel-heading">Aportes</div>
        <div class="panel-body">
            <ul class="timeline">

                <?php
                $contador = 0;
                foreach ($modelPostList as $post) {
                $class = 'class=timeline-badge';
                if ($contador++ % 2)
                    $class = 'class=timeline-inverted';


                ?>
                <!-->
                <li <?= $class; ?> >
                    <div class="timeline-badge"><i class="fa fa-check"></i>
                        <?= Html::img($post->user->getImageUrl(), ['class' => 'img-circle', 'style' => 'height:40px;']); ?>
                    </div>


                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <!--                                <h4 class="timeline-title">Lorem ipsum dolor</h4>-->

                            <p>
                                <small class="text-muted"><i
                                        class="glyphicon glyphicon-time"></i> <?= Yii::$app->formatter->asDatetime($post->created_at, 'long'); ?></small>
                            </p>
                        </div>
                        <div class="timeline-body">

                        </div>
                        <p><?= $post->content; ?></p>
                        <span class="label label-success"><?= $post->user->username ?></span>

<!--                        <h2>--><?//= $post->id; ?><!--</h2>-->

                        <?php foreach ($post->getpostDocuments()->all() as $postDocs): ?>

                            <?= Html::a($postDocs->document->name, [\Yii::$app->params['foroDocs'] . $postDocs->document->file],['class' => 'btn btn-primary']); ?>
                        <?php endforeach ?>


                        <?php
                        }
                        ?>

                    </div>

                </li>


            </ul>
        </div>

    </div>

</div>


<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading"><?= 'Aportes' ?></div>
        <div class="panel-body">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <table class="table table-condensed">
                    <div class="post-form">
                        <?php $form = ActiveForm::begin(['enableAjaxValidation' => false]); ?>
                        <?= $form->field($modelPost, 'content')->textarea(['rows' => 6]) ?>
                        <!--    --><? //= $form->field($model, 'status')->textInput() ?>
                        <?= $form->field($modelPost, 'status')->dropDownList($model->getStatusList()) ?>
                        <div class="form-group">
                            <?= Html::submitButton($modelPost->isNewRecord ? 'Crear' : 'Guardar', ['class' => $modelPost->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>


                    </div>

                </table>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <table class="table table-condensed">
                    <tr>
                        <center>
                            <a href=""><span style="font-size:20px;"</span><br>
                                <!--                                             class="glyphicon glyphicon-circle-arrow-up"></span><br>-->

                                <?= Html::a('Subir Documento', ['topic/createdoc', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

                                <!--                                <div>Subir Documento</div>-->
                            </a>
                            <hr>
                        </center>
                    </tr>
                    <tr>
                        <center>
                            <a href=""><span style="font-size:20px;"</span><br>
                                <!--                                             class="glyphicon glyphicon-circle-arrow-up"></span><br>-->

                                <?= Html::a('Subir Video', ['topic/createvideo', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                <!--                                <div>Subir Documento</div>-->
                            </a>
                            <hr>
                        </center>
                    </tr>
                    <tr>
                        <center>
                            <a href=""><span style="font-size:20px;"</span><br>
                                <!--                                             class="glyphicon glyphicon-circle-arrow-up"></span><br>-->

                                <?= Html::a('Subir Imagen', ['topic/createimg', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                <!--                                <div>Subir Documento</div>-->
                            </a>
                            <hr>
                        </center>
                    </tr>
                </table>
            </div>


        </div>
    </div>
</div>