<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use app\models\Post;
?>


<table cellspacing="10" cellpadding="10" border="1" style="width:100%">
    <tr>
        <td colspan="4">
            <h1>
                <center>Reporte</center>
            </h1>
        </td>
    </tr>

    <tr>
        <td colspan="4"><h4><strong>Nombre:</strong></h4><?= $model->name ?> </td>
    </tr>
    <tr>
        <td colspan="4"><h4><strong>Contenido:</strong></h4><?= $model->content ?></td>
    </tr>
    <tr>
        <td colspan="4"><h4><strong>Fecha de Inicio:</strong></h4><?= $model->begin_at ?></td>
    </tr>

    <tr>

        <td colspan="4">
            <?php foreach ($model->getTopics()->all() as $topic): ?>
                <table cellpadding="2" border="1">
                    <tr >
                        <td colspan="3" width=" 200mm" ><h4><strong>Tema:</strong></h4><?= $topic->content ?></td>
                    </tr>
                    <tr >
                        <td colspan="3" width=" 200mm" ><h4><strong>Aportes del Tema:</strong></h4></td>
                    </tr>
                    <?php
                    $contador = 1;
                    ?>
                    <?php foreach ($topic->getPosts()->all() as $post):
                        if ($post->status==Post::STATUS_ACTIVE):
                       ?>

                        <tr>
                            <td width="1" > <h3> <kbd> <?= $contador++ ?></kbd></h3></td>

                            <td width="1">

                                <?= Yii::$app->formatter->asDatetime($post->created_at, 'short'); ?>
<!--                                <p align="center">--><?//= Html::img($post->user->getImageUrl(), ['class' => 'img-circle', 'style' => 'height:30px;']); ?><!--</p>-->
                                <span class="label label-success"><?= $post->user->username ?></span></td>


                            <td width="120" ><?= $post->content ?></td>

                        </tr>
                    <?php    endif; endforeach; ?>

                </table>
                <br/>

            <?php endforeach; ?>
        </td>


    </tr>
</table>



