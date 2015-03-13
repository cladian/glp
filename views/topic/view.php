<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Topic */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Topics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topic-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'content:ntext',
            'status',
            'created_at',
            'updated_at',
            'user_id',
            'phforum_id',
        ],
    ]) ?>

</div>




<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelPost, 'content')->textarea(['rows' => 6]) ?>


    <!--    --><?//= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($modelPost, 'status')->dropDownList($model->getStatusList()) ?>



    <div class="form-group">
        <?= Html::submitButton($modelPost->isNewRecord ? 'Create' : 'Update', ['class' => $modelPost->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
foreach ($modelPostList as $post)
{
    echo $post->content;
}

?>