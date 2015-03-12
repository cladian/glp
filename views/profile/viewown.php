<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Perfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-primary">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <div class="profile-view">


<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
            'lastname',
            'institution_name',
            'responsability_name',
            'gender',
            'phone_number',
            'mobile_number',
//            'complete',
            'status',
//            'created_at',
//            'updated_at',
            'photo',
//            'user_id',
            [                    // the owner name of the model
                'label' => 'Usuario',
                'value' => $model->user->username,
            ],
//            'institutiontype_id',
            [                    // the owner name of the model
                'label' => 'Tipo de Instituto',
                'value' => $model->institutiontype->name,
            ],
//            'responsibilitytype_id',
            [                    // the owner name of the model
                'label' => 'Tipo de Responsabilidad',
                'value' => $model->responsibilitytype->name,
            ],
//            'country_id',
//            'country_id:html',  // description attribute in HTML
            [                    // the owner name of the model
                'label' => 'Pais',
                'value' => $model->country->name,
            ],
    ]]) ?>

</div>

<center>
<div class="col-xs-12 col-lg-4 col-md-4 col-lg-4">
    <?= Html::img($model->getImageUrl(),['class'=>'img-responsive img-thumbnail','style'=>'width=140px']);?>
    <?/*= Html::img($model->getImageUrl(),['class'=>'img-responsive img-thumbnail']);*/?>
</div>
</center>
<br>
<center>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="form-group">
        <?= Html::a('<span class="glyphicon glyphicon-user"></span> Avatar', ['avatarown', 'id' => $model->id], ['class' => 'btn btn-info btn-lg btn-block']) ?>
    </div>
</div>
</center>
</div>
<div class="col-xs-12 col-lg-12 col-md-12 col-lg-12">
    <p>
        
        
        
    </p>
</div>



<center>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <?= Html::a('<span class="glyphicon glyphicon-floppy-disk"></span> Actualizar', ['updateown', 'id' => $model->id], ['class' => 'btn btn-primary btn-lg btn-block']) ?>
                
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                
               <?= Html::a('<span class="glyphicon glyphicon-remove"></span> Cancelar', ['/site/index'], ['class' => 'btn btn-danger btn-lg btn-block']) ?>
            </div>
        </div>
</center>


  </div>
</div>
