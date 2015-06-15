<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Userphforum */

$this->title = 'Create Userphforum';
$this->params['breadcrumbs'][] = ['label' => 'Userphforums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userphforum-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
