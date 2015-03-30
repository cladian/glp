<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventanswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Respuestas por Evento';
/*$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="eventanswer-index">

    <?
    $gridColumns = [
        [
            'class' => '\kartik\grid\SerialColumn',
            'contentOptions'=>['class'=>'kartik-sheet-style'],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'reply',
            'editableOptions' => [
                'header' => 'Nombre',
                'size' => 'md',
                'inputType' => \kartik\editable\Editable::INPUT_TEXTAREA,
                'class' => 'text-danger',
                'format' => Editable::FORMAT_BUTTON,
            ],
        ],
        [
            'class' => '\kartik\grid\BooleanColumn',
            'attribute' => 'status',
            'trueLabel' => '1',
            'falseLabel' => '0'
        ],


    ];

    echo \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        // set your toolbar
        'toolbar' => [

            '{export}',
            '{toggleData}',
        ],
        'bordered' => true,
        'resizableColumns' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => true,
        'persistResize' => false,
        'exportConfig' => true,
        'pjax'=>true,
    ]);

    ?>

</div>
