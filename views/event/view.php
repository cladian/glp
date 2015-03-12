<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!--Pais-->
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <?= $this->render('/event/_detailinfo', ['model' => $model]) ?>
</div>
<!--END Pais-->
<!--Contenido-->
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingOne">
                <h5 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                       aria-controls="collapseOne">
                        Información General
                    </a>
                </h5>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <?= $model->getStatus($model->status);?>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'general_content:ntext',
                            'methodology:ntext',
                            'addressed_to:ntext',
                            'included:ntext',
                            'requirements:ntext',
                            [                    // the owner name of the model
                                'label' => 'Pais',
                                'value' => $model->country->name,
                            ],
                            'city',
                            'year',
                            'status',
/*                            [
                                'value'=>function($data){return 'data->getStatus('status')';}
                            ]*/
                        ],
                    ]) ?>
                </div>
                <div class="panel-footer">

                    <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                    <?= Html::a('Avatar', ['resources', 'id' => $model->id], ['class' => 'btn btn-info']) ?>

                </div>

            </div>
        </div>


        <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                       aria-expanded="false" aria-controls="collapseTwo">
                        Información de descuento
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'cost',
                            'discount',
                            'discount_end_at',
                            'discount_description',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>


        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                       aria-expanded="false" aria-controls="collapseThree">
                        Recursos
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'file:ntext',
                            'photo:ntext',
                            'url:ntext',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

        <div class="panel panel-success">
            <div class="panel-heading" role="tab" id="heading4">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4"
                       aria-expanded="false" aria-controls="collapse4">
                        Preguntas por evento
                    </a>
                </h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                <div class="panel-body">
                    <?= $this->render('_partialEventquestion', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel, 'eventtype_id' => $model->eventtype_id, 'event_id' => $model->id]) ?>
                </div>
            </div>
        </div>

    </div>

</div>

<!--END Contenido-->
