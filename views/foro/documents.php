<?php
use yii\helpers\Html;

use app\models\PhforumDocument;
use app\models\PhforumImagens;
use app\models\Topic;


use app\models\Document;
use app\models\Imagen;

?>
<div class="regresar">
    <?= Html::a(\Yii::$app->params['btnRegresar'],['/foro'], ['class' => 'btn btn-default'])?>


<!--    --><?//= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnGuardar'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">Listado de documentos del foro</div>

    <div class="panel-body">
        <div class="bs-example" data-example-id="striped-table">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
<!--                    <th>Clasificación</th>-->
<!--                    <th>Fecha</th>-->
<!--                    <th>Usuario</th>-->

                </tr>
                </thead>
                <tbody>

        </div>
        <?php
            $i=1;
            foreach ($modelForoDocs as $forodocs){ ?>
                <tr>
                    <th scope="row"><?= $i++;?></th>
                    <td>

                        <p><?= Html::a($forodocs->document->name, Yii::$app->urlManager->baseUrl . '/' . \Yii::$app->params['foroDocs'] . $forodocs->document->file, ['target' => '_blank', '']); ?></p>
                        <span class="label label-primary">Foro</span>
                        <span class="label label-default">-</span>
                        <span class="label label-default"><?= Yii::$app->formatter->asDatetime($forodocs->created_at, 'short'); ?></span>
<!--                    <td>Foro</td>-->
                   </td>
                    
                </tr>
        <?php
            }

        ?>

        <?php
        /*  $i=1;*/
        foreach ($modelTopicDocs as $topicdocs){ ?>
            <tr>
                <th scope="row"><?= $i++;?></th>
                <td>

                    <p><?= Html::a($topicdocs->document->name, Yii::$app->urlManager->baseUrl . '/' . \Yii::$app->params['foroDocs'] . $topicdocs->document->file, ['target' => '_blank']); ?></p>
                    <span class="label label-info">Tema</span>
                    <span class="label label-default"><?= ($topicdocs->topic->user->username);?></span>
                    <span class="label label-default"><?= Yii::$app->formatter->asDatetime($forodocs->created_at, 'short'); ?></span>
<!--                <td>--><?//= $topicdocs->document->name ?><!--</td>-->
<!--                <td>Tema</td>-->
               </td>
            </tr>
        <?php
            }

      /*  $i=1;*/
        foreach ($modelPostDocs as $postdocs){ ?>
            <tr>
                <th scope="row"><?= $i++;?></th>
                <td>
                    <p><?= Html::a($postdocs->document->name, Yii::$app->urlManager->baseUrl . '/' . \Yii::$app->params['foroDocs'] . $postdocs->document->file, ['target' => '_blank']); ?></p>
                    <span class="label label-success">Aporte</span>
                    <span class="label label-default"><?= ($postdocs->post->user->username);?></span>
                    <span class="label label-default"><?= Yii::$app->formatter->asDatetime($forodocs->created_at, 'long'); ?></span>
                </td>

                <!--<td><?/*= $postdocs->document->name */?></td>-->
<!--                <td>Aportes</td>-->


            </tr>
        <?php
        }

        ?>
        </tbody>
        </table>
    </div>
</div>
</div>
