<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use app\models\Post;

?>

    <h1>
        <center>Reporte</center>
    </h1>


   <h4><strong>Nombre:</strong></h4>
     <p><?= $model->name ?></p>


    <h4><strong>Contenido:</strong></h4>
    <p><?= $model->content ?></p>


<!--  <h4><strong>Fecha de Inicio:</strong></h4><p>--><?//= $model->begin_at ?><!--</p>-->

        <?php foreach ($model->getTopics()->all() as $topic): ?>

    <p>
<hr/>
   <h4><strong>Tema:</strong></h4><?= $topic->content ?>
    </p>
    <p>
   <h4><strong>Aportes del Tema:</strong></h4>
    </p>
<?php
$contador = 1;
?>
<?php foreach ($topic->getPosts()->all() as $post):
    if ($post->status == Post::STATUS_ACTIVE):
        ?>
        <small>  <?= Yii::$app->formatter->asDatetime($post->created_at, 'short'); ?></small>
        <span class="label label-success"><?= $post->user->username ?></span>
        <p>
            <kbd> <?= $contador++ ?></kbd>
            <?= $post->content ?>
            <!--                                <p align="center">-->
            <? //= Html::img($post->user->getImageUrl(), ['class' => 'img-circle', 'style' => 'height:30px;']); ?><!--</p>-->
        </p>

 <?php endif; endforeach; ?>

<?php endforeach; ?>








