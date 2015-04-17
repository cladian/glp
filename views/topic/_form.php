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

        <?php if($model->isNewRecord ){?>
            <?= Html::a(\Yii::$app->params['btnCancelar'], ['phforum/view', 'id' => $model->phforum_id], ['class' => 'btn btn-danger']) ?>
        <?php }else {?>
            <?= Html::a(\Yii::$app->params['btnCancelar'], ['view', 'id' => $model->phforum_id], ['class' => 'btn btn-danger']) ?>
        <?php }?>

<!--        --><?//= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnGuardar'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>

    </div>
    <div class="panel panel-green">
        <div class="panel-heading">Tema</div>
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