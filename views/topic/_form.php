<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Topic */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>

    <div class="breadcrumb">

        <?= Html::a(\Yii::$app->params['btnCancelar'], ['/phforum/view', 'id' => $model->phforum_id], ['class' => 'btn btn-default']) ?>
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>
    <div class="panel panel-green">
        <div class="panel-heading"> Crear Tema</div>
        <div class="panel-body">
            <div class="topic-form">


                <?= $form->field($model, 'content')->widget(CKEditor::className(), [
                    'options' => ['rows' => 3],
                    'preset' => 'complete'
                ]) ?>

                <!--    --><? //= $form->field($model, 'status')->textInput() ?>
                <?= $form->field($model, 'status')->dropDownList($model->getStatusList()) ?>


                <div class="form-group">

                </div>


            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>