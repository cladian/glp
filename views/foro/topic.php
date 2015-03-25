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
<div class="regresar">



<?= Html::a(\Yii::$app->params['btnRegresar'],['/foro'], ['class' => 'btn btn-default'])?>
</div>
<a name="sube"></a>
<div role="tabpanel" class="tab-pane active" id="home">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><?= $model->phforum->name ?></div>
            <div class="panel-body">
                TEMA:<?= $model->phforum->name ?>
                <hr/>
                CONTNEIDO:<?= $model->content ?>
                <hr/>
                EVENTO: <?= $model->phforum->event->name ?>
            </div>
        </div>
    </div>
</div>
<!-- Boton para bajar -->
<div class="regresar col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <button type="button" class="btn btn-default btn-lg">
      <a href="#baja"  class="glyphicon glyphicon-chevron-down" ></a>
    </button>
</div>
<!-- END Boton para bajar -->

<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

    <div class="panel panel-yellow">
        <div class="panel-heading">Mensajes recibidos</div>
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
                            <th scope="row"><h2><kbd> <?= $contador ?></kbd></h2> </th>
                            <td></td>
                            <td colspan="2">

                                <p><?= $post->content; ?> </p>

                                <small><i class="glyphicon glyphicon-time"></i> <?= Yii::$app->formatter->asDatetime($post->created_at, 'long'); ?></small>

                                </td>
                            <td>


                                <p align="center"><?= Html::img($post->user->getImageUrl(), ['class' => 'img-circle', 'style' => 'height:30px;']); ?></p>
                                <span class="label label-success"><?= $post->user->username ?></span>
                            </td>
                        </tr>
                        <tr class="<?= $class ?>">
                            <td colspan="5">
                                <button type="button" class="btn btn-default ">Agregar Comentario <span class="badge">0</span></button>
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
    </div>



    <div class="panel panel-yellow">
        <div class="panel-heading">Mensajes recibidos</div>
        <div class="panel-body">

            <div class="post-form">
                <?php $form = ActiveForm::begin(['enableAjaxValidation' => false]); ?>
                <?= $form->field($modelPost, 'content')->textarea(['rows' => 6]) ?>
                <!--    --><? //= $form->field($model, 'status')->textInput() ?>

                <div class="form-group">
                    <?= Html::submitButton($modelPost->isNewRecord ? 'Crear' : 'Guardar', ['class' => $modelPost->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>


            </div>
        </div>
    </div>



</div>


<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <div class="panel panel-yellow">
        <div class="panel-heading"> Mensajes recibidos</div>
        <div class="panel-body">
            <?php  foreach ($modelPostList as $post): ?>
                <div><small><i class="glyphicon glyphicon-time"></i> <?= Yii::$app->formatter->asDatetime($post->created_at, 'medium'); ?></small></div>
                <div><p><?= substr($post->content,0,50); ?>... </p></div>
                <button class="btn btn-default btn-xs pull-right" type="button">Ver </button>
                <div >
                    <p class="bg-info"> <?= $post->user->username ?></p>

                </div>

                <hr>
            <?php endforeach ?>



        </div>
    </div>
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


<!-- Boton para bajar -->
<div class="regresar col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <button type="button" class="btn btn-default btn-lg">
      <a href="#sube" class="glyphicon glyphicon-chevron-up" ></a>
    </button>
</div>
<!-- END Boton para bajar -->



<a name="baja"></a>