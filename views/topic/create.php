<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Topic */


//$this->params['breadcrumbs'][] = ['label' => 'Topics', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
$this->title='Nuevo Tema';
?>
<?= $this->render('_form', [
    'model' => $model,

]) ?>


