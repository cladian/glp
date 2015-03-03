<?php
use yii\helpers\Html;
use kartik\widgets\Growl;
use yii\grid\GridView;

/* @var $this yii\web\View */
$this->title = 'Panel de control de usuario';
$this->params['breadcrumbs'][] = $this->title;

// http://demos.krajee.com/widget-details/growl
//http://www.bsourcecode.com/yiiframework2/gridview-in-yiiframework-2-0/

if (!$hasProfile) {
    echo Growl::widget([
        'type' => Growl::TYPE_DANGER,
        'title' => 'Perfil',
        'icon' => 'glyphicon glyphicon-exclamation-sign',
        'body' => 'Actualicela para completar su inscripción',
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

    <?= Html::a('Actualizar datos de Perfil', ['/profile/createown'], ['class' => 'btn btn-success']) ?>
    <? /*= Html::a('Inscripción', ['/inscription/createown'], ['class' => 'btn btn-success']) */ ?>
    <div class="row">

        <div class="col-lg-4">
            <!--      <nav>
                      <ul class="pager">
                          <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Anterior</a></li>
                    <li class="next"><a href="#">Siguiente <span aria-hidden="true">&rarr;</span></a></li>
                </ul>
            </nav>-->

            <?php  // Begin ForEach
            foreach ($modelEvent as $event) {
                /* $timeDiff = date_diff(date_create($event->begin_at),date_create(date('Y-m-d')));*/

                //$timeDiff=intval($timeDiff/86400);
                //  $timeDiff=date('Y-m-d');
                ?>
                <h4><?= $event->name; ?></h4>

                <p><?= $event->short_description; ?></p>
                <!-- <p><?php /*echo $timeDiff;*/ ?></p>-->
                <address>
                    <strong><?= $event->city . ', ' . $event->country->name; ?></strong><br>
                    <strong>Inicia: </strong><?= Yii::$app->formatter->asDate($event->begin_at, 'long'); ?><br>
                    <strong>Finaliza: </strong><?= Yii::$app->formatter->asDate($event->end_at, 'long'); ?><br>
                    <strong>Inversión: </strong><?= $event->cost; ?> USD
                </address>
                <?= Html::a('Más información', ['site/event/', 'id' => $event->id], ['class' => 'btn  btn-primary']) ?>
                <?= Html::a('Inscribirme', ['inscription/createown/', 'id' => $event->id], ['class' => 'btn  btn-success']) ?>

            <?php }  // End ForEach ?>


        </div>
        <div class="col-lg-8">
            <h3>Mis inscripciones</h3>
            <?= GridView::widget([
                'dataProvider' => $dataInscription,
                'filterModel' => $searchInscription,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'event_id',
                        'value' => function ($data) {
                            return $data->event->name;
                        }
                    ],
//            'id',
                    //'exposition',
                    //  'service_terms',
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

                    [
                        'class' => 'yii\grid\CheckboxColumn',
                        // you may configure additional properties here
                    ],
                    // ['class' => 'yii\grid\ActionColumn'],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Acciones',

                        'template' => '{view}{update}{delete}{link}',
                        'buttons' => [
                            'link' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-info-sign"></span>', $url, [
                                    'title' => Yii::t('app', 'Info'),
                                ]);
                            }

                            /*                    'update' => function ($url, $model) {
                                                    return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url, [
                                                        'title' => Yii('yii', 'inscription/updateown'),
                                                    ]);

                                                }*/
                        ]
                    ],


                ],

            ]); ?>
        </div>

    </div>


    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>


