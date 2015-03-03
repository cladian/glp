<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Inscription */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inscripciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscription-view">
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button class="btn btn-primary" type="button"> Inscripción <span class="badge"><?= $model->complete;  ?>%</span></button>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-info" type="button"> Logistica <span class="badge"><?= $model->complete_logistic; ?>%</span></button>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-info" type="button"> Encuesta evento <span class="badge"><?= $model->complete_eventquiz; ?>%</span></button>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-info" type="button"> Encuesta General <span class="badge"><?= $model->complete_quiz; ?>%</span></button>
        </div>

    </div>

<br>
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

    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Inscripción',
                //'content' => 'Anim pariatur cliche...',
                'content' => $this->render('_partialInscription',['model'=>$model]),
                'active' => true
            ],
            [
                'label' => 'Logistica',
              //  'content' => 'Anim pariatur cliche...',
                'content' => $this->render('_partialLogistic',['model'=>$modelLogistic]),
              //  'options' => ['id' => 'myveryownID'],
        ],
        /*[
            'label' => 'Encuestas',
            'items' => [
                [
                    'label' => ' Generales',
                   // 'content' => $this->render('_partialEventAnswer',['dataProvider'=>$modelEventanswer]),
                ],
                [
                    'label' => 'Del Evento',
                    'content' => 'DropdownB, Anim pariatur cliche...',
                ],
            ],
        ],*/
    ],
]);  ?>

</div>
