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
<div class="institutiontype-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <?/*= Html::a('Crear Institución', ['create'], ['class' => 'btn btn-success']) */?>
       <?= Html::button(
           'create',
           ['value' => Url::to(['institutiontype/create']),
               'id' => 'modalButton'
           ]) ?>


       <?php
       Modal::begin([
           'id' => 'modal'
       ]);

       echo "<div id='modalContent'></div>";

       Modal::end();
       ?>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model){
            if ($model->status==1){
                return ['class'=>'success'];
            }elseif($model->status==0){
                return ['class'=>'danger'];
            }else
                return ['class'=>'warning'];

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
                'template' => '{view} {delete}',
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
                ],


            ],
        ],

    ]);


    ?>


</div>
<?php

Modal::begin([
    'header' => '<h4 class="modal-title">Nuevo registro</b></h4>',
    'id'=>'modal',
    'size'=>'modal-lg',
    'toggleButton' => ['label' => 'Create New'],
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>',
]);

echo 'Say hello...';

Modal::end();




?>


<?php $this->registerJs(
    "$('.activity-view-link').click(function() {
    $.get(
        'imgview',
        {
            id: $(this).closest('tr').data('key')
        },
        function (data) {
            $('.modal-body').html(data);
            $('#activity-modal').modal();
        }
    );
});
    "
); ?>

<?php


?>

<?php Modal::begin([
    'id' => 'activity-modal',
    'header' => '<h4 class="modal-title">View Image</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>',

]); ?>

<div class="well">


</div>


<?php Modal::end(); ?>
