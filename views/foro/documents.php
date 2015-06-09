<?php
use yii\helpers\Html;

use app\models\PhforumDocument;
use app\models\PhforumImagens;
use app\models\Topic;


use app\models\Document;
use app\models\Imagen;

?>
<div class="panel panel-primary">
    <div class="panel-heading">Listado de documentos del foro</div>
    <div class="panel-body">
        <div class="bs-example" data-example-id="striped-table">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Info</th>
                    <th>usuario</th>
                </tr>
                </thead>
                <tbody>



        </div>
        <?php
            $i=1;
            foreach ($modelForoDocs as $forodocs){ ?>
                <tr>
                    <th scope="row"><?= $i++;?></th>
                    <td><?= $forodocs->document->name ?></td>
                    <td>the Bird</td>
                    <td>-</td>
                </tr>
        <?php

            }
        ?>

        <?php
        $i=1;
        foreach ($modelTopicDocs as $topicdocs){ ?>
            <tr>
                <th scope="row"><?= $i++;?></th>
                <td><?= $forodocs->document->name ?></td>
                <td>TOPIC</td>
                <td>@twitter</td>
            </tr>
        <?php

        }

        $i=1;
        foreach ($modelPostDocs as $postdocs){ ?>
            <tr>
                <th scope="row"><?= $i++;?></th>
                <td><?= $postdocs->document->name ?></td>
                <td>POST---------------</td>
                <td>@twitter</td>
            </tr>
        <?php

        }
        ?>
        </tbody>
        </table>
    </div>
</div>
