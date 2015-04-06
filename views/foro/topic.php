<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\PhforumDocument;
use app\models\PhforumImagens;
use kartik\widgets\FileInput;

use app\models\Document;
use app\models\Imagen;


?>

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

<div class="regresar">


    <?= Html::a(\Yii::$app->params['btnRegresar'], ['/foro'], ['class' => 'btn btn-default']) ?>

</div>

<a name="sube"></a>


<div role="tabpanel" class="tab-pane active" id="home">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><?= $model->phforum->name ?></div>
            <div class="panel-body">
                <center style="text-align:justify;"><?= substr($model->content, 0, 170); ?>...</a> </center>
                <hr/>
                EVENTO: <?= $model->phforum->event->name ?>
            </div>
        </div>
    </div>
</div>


<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">

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

                            </td>
                            <td>


                                <p align="center"><?= Html::img($post->user->getImageUrl(), ['class' => 'img-circle', 'style' => 'height:30px;']); ?></p>
                                <span class="label label-success"><?= $post->user->username ?></span>
                            </td>
                        </tr>
                        <tr class="<?= $class ?>">
                            <td colspan="5">
                                <!--                                <button type="button" class="btn btn-default ">Agregar Comentario <span class="badge">0</span></button>-->
                                <!--&nbsp;<button class="btn btn-default btn-xs pull-right" type="button">Documentos <span class="badge">4</span></button>
                                &nbsp;<button class="btn btn-default btn-xs pull-right" type="button">Imagenes <span class="badge">4</span></button>
                                &nbsp;<button class="btn btn-default btn-xs pull-right" type="button">Videos <span class="badge">4</span></button>
-->
                            </td>
                        </tr>

                        <?php foreach ($post->getpostDocuments()->all() as $postDocs): ?>
                        <?= Html::a($postDocs->document->name, [\Yii::$app->params['foroDocs'] . $postDocs->document->file], ['class' => 'btn btn-primary']); ?>
                    <?php endforeach ?>


                    <?php
                        // endForaeach 1
                    endforeach ?>
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



    <?php if (!Yii::$app->user->isGuest) { ?>
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

                                'showRemove' => false,
                                'showUpload' => false,
                                'showPreview' => false,
                                'browseClass' => 'btn btn-primary btn-block',
                                'browseLabel' =>  'Explorar'

                            ],
                        ]);

                        ?>

                    </div>

                    <div class="form-group">
                        <?= Html::submitButton($modelPost->isNewRecord ? \Yii::$app->params['btnCrear'] : \Yii::$app->params['btnGuardar'], ['class' => $modelPost->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>


                </div>
            </div>
        </div>
    <?php } else { ?>

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

    <?php } ?>
</div>

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

