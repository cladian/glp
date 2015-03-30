
<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<!---->
<?//= $modelProfile->name;?>
<div class="panel panel-primary">
    <div class="panel-heading"><?= Html::encode($this->title) ?></div>
    <div class="panel-body">

<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
    <?= DetailView::widget([
        'model' => $modelProfile,
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
//            'status',
//            'created_at',
//            'updated_at',
//            'photo',
//            'user_id',
            [                    // the owner name of the model
                'label' => 'Usuario',
                'value' => $modelProfile->user->username,
            ],
//            'institutiontype_id',
            [                    // the owner name of the model
                'label' => 'Tipo de Instituto',
                'value' => $modelProfile->institutiontype->name,
            ],
//            'responsibilitytype_id',
            [                    // the owner name of the model
                'label' => 'Tipo de Responsabilidad',
                'value' => $modelProfile->responsibilitytype->name,
            ],
//            'country_id',
//            'country_id:html',  // description attribute in HTML
            [                    // the owner name of the model
                'label' => 'Pais',
                'value' => $modelProfile->country->name,
            ],
        ]]) ?>

</div>

<center>
    <div class="col-xs-12 col-lg-4 col-md-4 col-lg-4">
        <?= Html::img($modelProfile->getImageUrl(),['class'=>'img-responsive img-thumbnail','style'=>'width=140px']);?>
        <?/*= Html::img($model->getImageUrl(),['class'=>'img-responsive img-thumbnail']);*/?>
    </div>
</center>
<br>

</div>
<div class="col-xs-12 col-lg-12 col-md-12 col-lg-12">
    <p>
    </p>
</div>

</div>
</div>
