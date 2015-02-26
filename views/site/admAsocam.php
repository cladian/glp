<?php
use yii\helpers\Html;
use kartik\widgets\Growl;

use yii\grid\GridView;

/* @var $this yii\web\View */
$this->title = 'Panel de control de usuario';
$this->params['breadcrumbs'][] = $this->title;

// http://demos.krajee.com/widget-details/growl

if (!$hasProfile){
    echo Growl::widget([
        'type' => Growl::TYPE_WARNING,
        'title' => 'Perfil de usario incompleto',
        'icon' => 'glyphicon glyphicon-exclamation-sign',
        'body' => 'Actualicelo inmediatamente',
        'showSeparator' => true,
        'delay' => 0,
        'pluginOptions' => [
            'placement' => [
                'from' => 'top',
                'align' => 'right',
            ]
        ]
    ]);


}
?>
<div class="site-about">
    <h3><?= Html::encode($this->title) ?></h3>

    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button class="btn btn-primary" type="button"> Usuarios <span class="badge"><?= $activeUsers; ?></span></button>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-info" type="button"> Eventos <span class="badge"><?= $activeEvents; ?></span></button>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-primary" type="button"> Inscripciones <span class="badge"><?= $activeInscriptions; ?></span></button>
        </div>
        <div class="btn-group" role="group">
            <?= Html::a('Perfil', ['/profile/createown'], ['class' => 'btn btn-warning']) ?>
        </div>
    </div>

</div>

<div class="inscription-index">

    <h3>Inscripciones activas</h3>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'exposition',
           // 'service_terms',
            'complete',
            'status',
            // 'created_at',
            // 'updated_at',
            // 'complete_logistic',
            // 'complete_eventquiz',
            // 'complete_quiz',
            // 'event_id',
            // 'user_id',
            // 'registertype_type',
            // 'registertype_assigment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>


