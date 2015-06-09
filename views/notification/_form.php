<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Notification */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
    <div class="class breadcrumb">
        <?= Html::a(\Yii::$app->params['btnCancelar'], ['/phforum/view', 'id' => $id], ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnEnvelope'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <div class="panel panel-green">
        <div class="panel-heading">Nueva notificación FORO</div>
        <div class="panel-body">


            <?= $form->field($model, 'text')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'basic'
            ]) ?>


            <!--    --><? //= $form->field($model, 'status')->textInput() ?>


            <!--    --><? //= $form->field($model, 'created_at')->textInput() ?>
            <!---->
            <!--    --><? //= $form->field($model, 'updated_at')->textInput() ?>



            <div class="form-group">

            </div>


        </div>
    </div>

<?php ActiveForm::end(); ?>