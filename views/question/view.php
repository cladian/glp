<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;


/* @var $this yii\web\View */
/* @var $model app\models\Question */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-view">


    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Preguntas',
//                'content' => 'Anim pariatur cliche...',
                'content' => $this->render('_partialQuestion',['model'=>$model]),
//                'active' => true
            ],
            [
                'label' => 'Preguntas por Evento',
//                  'content' => 'Anim pariatur cliche...',
                'content' => $this->render('_partialEventquestion',['dataProvider'=>$dataProviderEventquestion, 'searchModel'=>$searchModelEventquestion]),
                //  'options' => ['id' => 'myveryownID'],
            ],
            [
                'label' => 'Preguntas  Generales',
//                  'content' => 'Anim pariatur cliche...',
                'content' => $this->render('_partialGeneralquestion',['dataProvider'=>$dataProviderGeneralquestion, 'searchModel'=>$searchModelGeneralquestion]),
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
    ]) ?>

</div>
