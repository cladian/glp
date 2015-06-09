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
                    <th>Clasificación</th>
                    <th>Usuario</th>
                    <th>Fecha</th>

                </tr>
                </thead>
                <tbody>

        </div>
        <?php
            $i=1;
            foreach ($modelForoDocs as $forodocs){ ?>
                <tr>
                    <th scope="row"><?= $i++;?></th>
                    <td><?= Html::a($forodocs->document->name, Yii::$app->urlManager->baseUrl . '/' . \Yii::$app->params['foroDocs'] . $forodocs->document->file, ['target' => '_blank', '']); ?></td>
                    <td>Foro</td>
                    <td>-</td>
                    <td><?= Yii::$app->formatter->asDatetime($forodocs->created_at, 'short'); ?></td>
                </tr>
        <?php
            }

        ?>

        <?php
        /*  $i=1;*/
        foreach ($modelTopicDocs as $topicdocs){ ?>
            <tr>
                <th scope="row"><?= $i++;?></th>
                <td><?= Html::a($topicdocs->document->name, Yii::$app->urlManager->baseUrl . '/' . \Yii::$app->params['foroDocs'] . $topicdocs->document->file, ['target' => '_blank']); ?></td>
<!--                <td>--><?//= $topicdocs->document->name ?><!--</td>-->
                <td>Tema</td>
                <td><?= ($topicdocs->topic->user->username);?></td>
                <td><?= Yii::$app->formatter->asDatetime($forodocs->created_at, 'short'); ?></td>
            </tr>
        <?php
            }

      /*  $i=1;*/
        foreach ($modelPostDocs as $postdocs){ ?>
            <tr>
                <th scope="row"><?= $i++;?></th>
                <td><?= Html::a($postdocs->document->name, Yii::$app->urlManager->baseUrl . '/' . \Yii::$app->params['foroDocs'] . $postdocs->document->file, ['target' => '_blank']); ?></td>
                <!--<td><?/*= $postdocs->document->name */?></td>-->
                <td>Aporte</td>
                <td><?= ($postdocs->post->user->username);?></td>
                <td><?= Yii::$app->formatter->asDatetime($forodocs->created_at, 'short'); ?></td>
            </tr>
        <?php
        }

        ?>
        </tbody>
        </table>
    </div>
</div>
</div>
