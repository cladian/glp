<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\editable\Editable;
use yii\bootstrap\Modal;

use yii\widgets\Pjax;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel app\models\InstitutiontypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipos de Institución';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-green">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<<<<<<< HEAD
    <p>
        <? /*= Html::a('Crear Institución', ['create'], ['class' => 'btn btn-success']) */ ?>
        <?= Html::button(
            'create',
            ['value' => Url::to(['institutiontype/create']),
                'id' => 'modalButton',

            ]) ?>


        <?php
        Modal::begin([
            'id' => 'modal',
            'header' => '<h4 class="modal-title">Add new candidate</h4>',
    'footer' =>
        Html::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])
        . PHP_EOL .
        Html::button('Add', ['class' => 'btn btn-primary btn-modal-save']),
    'options' => [
            'role' => 'dialog',
            'aria-labelledby' => 'candidate-modal-label',
            'aria-hidden' => 'true',
            'data-url' => Url::to('candidate/create'),
        ],
        ]);
=======
    
>>>>>>> daniel

        echo "<div id='modalContent'></div>";

        Modal::end();
        ?>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model) {
            if ($model->status == 1) {
                return ['class' => 'success'];
            } elseif ($model->status == 0) {
                return ['class' => 'danger'];
            } else
                return ['class' => 'warning'];

        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'name',
            'description:ntext',
            'status',
//            'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn',
                /*'template' => '{view} {delete}',
                'headerOptions' => ['width' => '20%', 'class' => 'activity-view-link',],
                'contentOptions' => ['class' => 'padding-left-5px'],

                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', '#', [
                            'id' => 'activity-view-link',
                            'title' => Yii::t('yii', 'View'),
                            'data-toggle' => 'modal',
                            'data-target' => '#activity-modal',
                            'data-id' => $key,
                            'data-pjax' => '0',

                        ]);
                    },
                ],*/


            ],
        ],

    ]);


    ?>

  </div>
</div>
<p>
        <?= Html::a(\Yii::$app->params['btnInstitucion'], ['create'], ['class' => 'btn btn-success']) ?>
    </p>