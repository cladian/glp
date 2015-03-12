<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-green">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'lastname',
            'institution_name',
            'responsability_name',
            // 'gender',
            // 'phone_number',
            // 'mobile_number',
            // 'complete',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'user_id',
            // 'institutiontype_id',
            // 'responsibilitytype_id',
            // 'country_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  </div>
</div>
<div class="profile-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

</div>
