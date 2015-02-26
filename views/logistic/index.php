<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LogisticSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logistics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logistic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Logistic', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'inscription_id',
            'leavingonorigincity',
            'leavingonairline',
            'leavingonflightnumber',
            // 'leavingondate',
            // 'leavingonhour',
            // 'returningonairline',
            // 'returningonflightnumber',
            // 'returningondate',
            // 'returningonhour',
            // 'residence',
            // 'residenceobs:ntext',
            // 'accommodationdatein',
            // 'accommodationdateout',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
