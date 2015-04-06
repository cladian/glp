<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\Assignment */

$this->title = 'Asignaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <!--Visualización información del evento-->

    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="panel-heading" role="tab" id="headingOne">

                <h1><?= Html::encode($this->title) ?></h1>
            </div>

            <?php
            Pjax::begin([
                'enablePushState'=>false,
            ]);
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => $usernameField,
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template'=>'{view}'
                    ],
                ],
            ]);
            Pjax::end();
            ?>
             </div>
    </div>




</div>
